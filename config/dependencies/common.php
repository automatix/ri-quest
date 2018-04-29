<?php
use App\Base\Utils\CamelCaseToSnakeCaseNameConverter;
use App\Base\Utils\NameConverterInterface;
use App\Process\EventHandlerInterface;
use App\Process\ProcessEventHandlers\AccessHandler;
use App\Process\ProcessEventHandlers\CompletionHandler;
use App\Process\ProcessEventHandlers\PoiHandler;
use App\Process\ProcessEventHandlers\QuestHandler;
use App\Process\ProcessEventHandlers\StepHandler;
use App\Process\SystemEventHandler;
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
    'process_handler.step' => DI\autowire(StepHandler::class),
    'process_handler.poi' => DI\autowire(PoiHandler::class),
    'process_handler.quest' => DI\autowire(QuestHandler::class),
    'process_handler.access' => DI\autowire(AccessHandler::class),
    'process_handler.completion' => DI\autowire(CompletionHandler::class),
    EventHandlerInterface::class => DI\factory(function(ContainerInterface $container) {
        // The array index determines the priority and so the handling order!
        $listeners = [
            'process_handler.step',
            'process_handler.poi',
            'process_handler.quest',
            'process_handler.access',
            'process_handler.completion',
        ];
        return new SystemEventHandler($container->get(StateManagingServiceInterface::class), $listeners);
    }),

];

$commonLocalDependenciesPath = __DIR__ . DIRECTORY_SEPARATOR . 'common.local.php';
$commonLocalDependencies = file_exists($commonLocalDependenciesPath) ? require $commonLocalDependenciesPath : [];

$mergedDefinitions = array_merge($commonDependencies, $commonLocalDependencies);

return $mergedDefinitions;