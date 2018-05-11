<?php

use App\Base\Utils\CamelCaseToSnakeCaseNameConverter;
use App\Base\Utils\NameConverterInterface;
use App\Process\EventHandlerInterface;
use App\Process\ProcessEventHandlers\AccessProcessEventHandler;
use App\Process\ProcessEventHandlers\CompletionProcessEventHandler;
use App\Process\ProcessEventHandlers\PoiProcessEventHandler;
use App\Process\ProcessEventHandlers\ScenarioProcessEventHandler;
use App\Process\ProcessEventHandlers\StepProcessEventHandler;
use App\Process\SystemEventHandlerFactory;
use App\Process\SystemEventHandlerInterface;
use App\Services\Dummy\External\FooBService;
use App\Services\Dummy\External\FooServiceInterface;
use App\Services\Dummy\Internal\BarService;
use App\Services\Dummy\Internal\BarServiceInterface;
use App\Services\Process\Internal\StateManagingService;
use App\Services\Process\StateManagingServiceInterface;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

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
    StateManagingServiceInterface::class => DI\autowire(StateManagingService::class),
    'process_handler.step' => DI\autowire(StepProcessEventHandler::class),
    'process_handler.poi' => DI\autowire(PoiProcessEventHandler::class),
    'process_handler.scenario' => DI\autowire(ScenarioProcessEventHandler::class),
    'process_handler.access' => DI\autowire(AccessProcessEventHandler::class),
    'process_handler.completion' => DI\autowire(CompletionProcessEventHandler::class),
    SystemEventHandlerInterface::class => DI\factory([new SystemEventHandlerFactory(), 'create']),
    'system.event_handler' => DI\get(SystemEventHandlerInterface::class),
    EventDispatcherInterface::class => DI\get('event_dispatcher'),
];

$commonLocalDependenciesPath = __DIR__ . DIRECTORY_SEPARATOR . 'common.local.php';
$commonLocalDependencies = file_exists($commonLocalDependenciesPath) ? require $commonLocalDependenciesPath : [];

$mergedDefinitions = array_merge($commonDependencies, $commonLocalDependencies);

return $mergedDefinitions;