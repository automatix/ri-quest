<?php
namespace App\Services\Process\Internal;

use App\Base\Entity\Chat;
use App\Base\Entity\User;
use App\Base\Enums\Entities\ChatType;
use App\Base\Repository\ChatRepository;
use App\Services\Process\ChatServiceInterface;
use App\Services\Process\UserServiceInterface;

/**
 * @package App\Services\Process\Internal
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class ChatService implements ChatServiceInterface
{

    /** @var ChatRepository */
    private $chatRepository;
    /** @var UserServiceInterface */
    private $userService;

    public function __construct(ChatRepository $chatRepository, UserServiceInterface $userService)
    {
        $this->chatRepository = $chatRepository;
        $this->userService = $userService;
    }

    /**
     * @param int $identifier
     * @param ChatType $chatType
     * @return Chat
     */
    public function findOneByIdentifierAndType(int $identifier, ChatType $chatType): ?Chat
    {
        return $this->chatRepository->findOneByIdentifierAndType($identifier, $chatType);
    }

    /**
     * @inheritdoc
     */
    public function create(int $identifier, ChatType $chatType): ?Chat
    {
        $user = $this->userService->create();
        $chat = (new Chat())
            ->setIdentifier($identifier)
            ->setType($chatType)
            ->setUser($user)
        ;
        $this->chatRepository->createEntity($chat);
        return $chat;
    }

}
