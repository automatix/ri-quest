<?php
namespace App\Services\Process\Internal;

use App\Base\Entity\Chat;
use App\Base\Entity\Processes\WorkflowProcess;
use App\Base\Enums\Entities\ChatType;
use App\Base\Repositories\ChatRepository;
use App\Base\Repositories\Processes\WorkflowProcessRepository;
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
    /** @var WorkflowProcessRepository */
    private $workflowProcessRepository;
    /** @var UserServiceInterface */
    private $userService;

    public function __construct(ChatRepository $chatRepository, UserServiceInterface $userService, WorkflowProcessRepository $workflowProcessRepository)
    {
        $this->chatRepository = $chatRepository;
        $this->userService = $userService;
        $this->workflowProcessRepository = $workflowProcessRepository;
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

    /**
     * @inheritdoc
     */
    public function findActiveWorkflowProcessForChat(Chat $chat): ?WorkflowProcess
    {
        /** @var WorkflowProcess $workflowProcess */
        $workflowProcess = $this->workflowProcessRepository->findOneBy([
            'chat' => $chat,
            // 'state' => IS NOT WorkflowState::FINISHED
        ]);
        return $workflowProcess;
    }

}
