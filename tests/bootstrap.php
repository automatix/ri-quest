<?php
use App\Test\Bootstrap;
use DI\ContainerBuilder;

require __DIR__ . '/../vendor/autoload.php';

$diContainerBuilder = new ContainerBuilder();
$diContainerBuilder->addDefinitions(__DIR__ . '/../config/dependencies/phpunit.php');
$diContainer = $diContainerBuilder->build();
$configFile = __DIR__ . '/../config/';
$projectRoot = __DIR__ . '/..';
$dbConfigs = [
    // connection settings
    'dsn' => getenv('DB_DSN'),
    'database' => getenv('DB_DBNAME'),
    'username' => getenv('DB_USER'),
    'password' => getenv('DB_PASSWD'),
    // SQL scripts
    'scripts' => [
        'schema' => $projectRoot . getenv('DB_CONTENT_ROOT_DIR') . '/' . getenv('DB_CONTENT_FILE_SCHEMA'),
        'stored-procedures' => $projectRoot . getenv('DB_CONTENT_ROOT_DIR') . '/' . getenv('DB_CONTENT_FILE_STORED_PROCEDURES'),
        'basic-data' =>  $projectRoot . getenv('DB_CONTENT_ROOT_DIR') . '/' . getenv('DB_CONTENT_FILE_BASIC_DATA'),
        'test-data' => array_map(function ($basicDataFileName) use($projectRoot) {
            return $projectRoot . getenv('DB_CONTENT_ROOT_DIR') . '/' . getenv('DB_CONTENT_TEST_DATA_DIR') . '/' . $basicDataFileName;
        }, explode(',', getenv('DB_CONTENT_FILES_TEST_DATA'))),
    ],
];
/** @var ContainerBuilder $diContainerBuilder */
$bootstrap = new Bootstrap($diContainer, $dbConfigs);

$bootstrap->init();