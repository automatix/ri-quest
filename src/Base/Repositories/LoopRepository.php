<?php
namespace App\Base\Repositories;

use App\Base\Entity\Loop;
use App\Base\Selectors\LoopSelector;

class LoopRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return Loop::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return LoopSelector::class;
    }
    
}
