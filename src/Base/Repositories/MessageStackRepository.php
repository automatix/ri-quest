<?php
namespace App\Base\Repositories;

use App\Base\Entity\AbstractMessageStack;
use App\Base\Selectors\AbstractMessageStackSelector;

class MessageStackRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return AbstractMessageStack::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AbstractMessageStackSelector::class;
    }
    
}
