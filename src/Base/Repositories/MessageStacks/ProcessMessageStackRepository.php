<?php
namespace App\Base\Repositories\MessageStacks;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\MessageStacks\ProcessMessageStack;
use App\Base\Selectors\MessageStacks\ProcessMessageStackSelector;

class ProcessMessageStackRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return ProcessMessageStack::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return ProcessMessageStackSelector::class;
    }
    
}
