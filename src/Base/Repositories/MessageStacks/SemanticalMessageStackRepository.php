<?php
namespace App\Base\Repositories\MessageStacks;

use App\Base\Entity\MessageStacks\SemanticalMessageStack;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\MessageStacks\SemanticalMessageStackSelector;

class SemanticalMessageStackRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return SemanticalMessageStack::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return SemanticalMessageStackSelector::class;
    }
    
}
