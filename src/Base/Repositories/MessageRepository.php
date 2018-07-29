<?php
namespace App\Base\Repositories;

use App\Base\Entity\Message;
use App\Base\Selectors\MessageSelector;

class MessageRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return Message::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return MessageSelector::class;
    }
    
}
