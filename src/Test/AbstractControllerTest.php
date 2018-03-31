<?php
namespace App\Test;

use App\Services\Dummy\External\FooServiceInterface;
use App\Services\Dummy\Internal\BarServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\DbUnit\TestCaseTrait;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class AbstractControllerTest
 *
 * @package App\Test
 */
abstract class AbstractControllerTest extends KernelTestCase
{

    use TestCaseTrait;
    use DatabaseConnectionTrait;

    /** @var ContainerInterface */
    protected static $diContainer;

    public static function setDiContainer(ContainerInterface $diContainer = null)
    {
        if (! $diContainer) {
            self::bootKernel();
            $diContainer = self::$kernel->getContainer();
        }
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
