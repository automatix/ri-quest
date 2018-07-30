<?php
namespace App\Base\Repositories\MessageStacks;

use App\Base\Entity\MessageStacks\PlanMessageStack;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\MessageStacks\PlanMessageStackSelector;

class PlanMessageStackRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return PlanMessageStack::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return PlanMessageStackSelector::class;
    }
    
}
