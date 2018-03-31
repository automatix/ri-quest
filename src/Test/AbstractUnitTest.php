<?php
namespace App\Test;

use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Class AbstractUnitTest
 *
 * @package App\Test
 */
abstract class AbstractUnitTest extends TestCase
{

    use TestCaseTrait;
    use DatabaseConnectionTrait;

    /** @var ContainerInterface */
    protected static $diContainer;

    public static function setDiContainer(ContainerInterface $diContainer)
    {
        self::$diContainer = $diContainer;
    }

    /**
     * @return ContainerInterface
     */
    protected function getDiContainer()
    {
        return self::$diContainer;
    }

    /**
     * @return ContainerInterface
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function getEntityManager()
    {
        return $this->getDiContainer()->get(EntityManagerInterface::class);
    }

}
