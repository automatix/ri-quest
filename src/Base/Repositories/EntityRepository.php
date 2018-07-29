<?php
namespace App\Base\Repositories;

use App\Base\Entity\AbstractEntity;
use App\Base\Selectors\AbstractEntitySelector;

class EntityRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return AbstractEntity::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AbstractEntitySelector::class;
    }
    
}
