<?php
namespace App\Test;

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Exception;

error_reporting(E_ALL | E_STRICT);
ini_set('memory_limit', '2048M');
chdir(__DIR__);

/**
 * Sets up the DI container and the database.
 */
class Bootstrap
{

    /** @var ContainerInterface */
    protected $diContainer;
    /** @var array */
    protected $dbConfigs;

    /**
     * Bootstrap constructor.
     *
     * @param ContainerInterface $diContainer
     * @param array $dbConfigs
     */
    public function __construct(ContainerInterface $diContainer, array $dbConfigs)
    {
        $this->diContainer = $diContainer;
        $this->dbConfigs = $dbConfigs;
    }

    /**
     * Sets up the DB connection and the DI container
     * for the Abstract*TestCase classes.
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function init()
    {
        $this->setUpDbConnection();
        $this->setUpDiContainer();
    }

    protected function setUpDiContainer()
    {
        AbstractUnitTest::setDiContainer($this->diContainer);
        AbstractControllerTest::setDiContainer();
    }

    protected function setUpDbConnection()
    {
        $databaseInitializer = new DatabaseInitializer($this->dbConfigs);
        $databaseInitializer->setUp();
        AbstractUnitTest::setDbConfigs($this->dbConfigs);
        AbstractControllerTest::setDbConfigs($this->dbConfigs);
    }

}
