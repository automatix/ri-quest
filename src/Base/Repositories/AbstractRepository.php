<?php
namespace App\Base\Repositories;

use App\Base\Entity\AbstractEntity;
use App\Base\Exceptions\GeneralErrorContextCode;
use App\Base\Exceptions\GeneralException;
use App\Base\Selectors\AbstractSelector;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 * The class AbstractRepository is the parent class of all Repository classes
 * and proveds the basic functionality for the data access.
 *
 * @package App\Base\Repositories
 * @author Ilya Khanataev <contact@mevatex.com>
 */
abstract class AbstractRepository extends EntityRepository
{

    /**
     * AbstractRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, new ClassMetadata($this->getEntityClass()));
    }

    /**
     * @param AbstractSelector $id
     * @return AbstractEntity
     * @throws GeneralException
     */
    public function findOne(AbstractSelector $id): ?AbstractEntity
    {
        $this->checkSelector($id);
        /** @var AbstractEntity $entity */
        $entity = $this->find($id->getId());
        return $entity;
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
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function createEntity(AbstractEntity $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush($entity);
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
