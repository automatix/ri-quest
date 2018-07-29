<?php
namespace App\Base\Repositories;

use App\Base\Entity\Chat;
use App\Base\Selectors\ChatSelector;

class ChatRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return Chat::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return ChatSelector::class;
    }
    
}
