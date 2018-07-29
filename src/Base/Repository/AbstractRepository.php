<?php
namespace App\Base\Repository;

use App\Base\Entity\AbstractEntity;
use App\Base\Exceptions\GeneralErrorContextCode;
use App\Base\Exceptions\GeneralException;
use App\Base\Selectors\AbstractSelector;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * The class AbstractRepository is the parent class of all Repository classes
 * and proveds the basic functionality for the data access.
 *
 * @package App\Base\Repository
 * @author Ilya Khanataev <contact@mevatex.com>
 */
abstract class AbstractRepository
{

    /** @var EntityManagerInterface */
    private $entityManager;

    /**
     * AbstractRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param AbstractSelector $id
     * @return AbstractEntity
     * @throws GeneralException
     */
    public function find(AbstractSelector $id)
    {
        $this->checkSelector($id);
        return $this->getRepository()->find($id);
    }

    /**
     * @return AbstractEntity[]
     */
    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    /**
     * @return string The FQCN of the Entity class, the repository is responsible for.
     */
    abstract public function getEntityClass();

    /**
     * @return string The FQCN of the Selector for the managed Entity.
     */
    abstract public function getEntitySelectorClass();

    /**
     * @param AbstractEntity $entity
     * @return void
     */
    public function createEntity(AbstractEntity $entity)
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush($entity);
    }

    /**
     * @return EntityManagerInterface
     */
    protected function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    /**
     * @param EntityManagerInterface $entityManager
     * @return AbstractRepository
     */
    protected function setEntityManager(EntityManagerInterface $entityManager): AbstractRepository
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * @return ServiceEntityRepositoryInterface
     */
    protected function getRepository(): ObjectRepository
    {
        return $this->entityManager->getRepository($this->getEntityClass());
    }

    /**
     * @param AbstractSelector $id
     * @throws GeneralException
     */
    private function checkSelector(AbstractSelector $id): void
    {
        $entitySelectorClass = $this->getEntitySelectorClass();
        if (!($id instanceof $entitySelectorClass)) {
            throw new GeneralException(null, GeneralErrorContextCode::INVALID_ARGUMENT());
        }
    }

}