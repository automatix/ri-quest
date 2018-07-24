<?php
namespace App\Base\Repository;

use App\Base\Entity\Chat;
use App\Base\Enums\Entities\ChatType;
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

    /**
     * @param int $identifier
     * @param ChatType $chatType
     * @return Chat
     */
    public function findOneByIdentifierAndType(int $identifier, ChatType $chatType): ?Chat
    {
        /** @var Chat $chat */
        $chat = $this->getRepository()->findOneBy([
            'identifier' => $identifier,
            'type' => $chatType->getValue()
        ]);
        return $chat;
    }

}
