<?php

use App\Base\Utils\CamelCaseToSnakeCaseNameConverter;
use App\Base\Utils\NameConverterInterface;
use App\Process\EventListenerInterface;
use App\Process\Listeners\PoiListener;
use App\Process\Listeners\QuestListener;
use App\Process\Listeners\StepListener;
use App\Process\ProcessHandler;
use App\Services\Dummy\External\FooBService;
use App\Services\Dummy\External\FooServiceInterface;
use App\Services\Dummy\Internal\BarService;
use App\Services\Dummy\Internal\BarServiceInterface;
use App\Services\Process\StateManagingServiceInterface;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Psr\Container\ContainerInterface;

$commonDependencies = [
    FooServiceInterface::class => DI\autowire(FooBService::class),
    BarServiceInterface::class => DI\autowire(BarService::class),
    NameConverterInterface::class => DI\autowire(CamelCaseToSnakeCaseNameConverter::class),
    EntityManagerInterface::class => function () {
        $config = new Configuration();
        $config->setMetadataDriverImpl(new AnnotationDriver(new AnnotationReader()));
        $config->setProxyDir(__DIR__ . '/../../var/cache/' . getenv('APP_ENV') . '/doctrine/orm/Proxies');
        $config->setProxyNamespace('Proxies');
        $connectionParams = [
            'url' => getenv('DATABASE_URL'),
        ];
        $connection = DriverManager::getConnection($connectionParams, $config);
        return EntityManager::create($connection, $config);
    },
    StateManagingServiceInterface::class => DI\autowire(StateManagingServiceInterface::class),
    'process_listener.step' => DI\autowire(StepListener::class),
    'process_listener.poi' => DI\autowire(PoiListener::class),
    'process_listener.quest' => DI\autowire(QuestListener::class),
    EventListenerInterface::class => DI\factory(function(ContainerInterface $container) {
        $listeners = [
            'process_listener.step',
            'process_listener.poi',
            'process_listener.quest',
        ];
        return new ProcessHandler($container->get(StateManagingServiceInterface::class), $listeners);
    }),

];

$commonLocalDependenciesPath = __DIR__ . DIRECTORY_SEPARATOR . 'common.local.php';
$commonLocalDependencies = file_exists($commonLocalDependenciesPath) ? require $commonLocalDependenciesPath : [];

$mergedDefinitions = array_merge($commonDependencies, $commonLocalDependencies);

return $mergedDefinitions;