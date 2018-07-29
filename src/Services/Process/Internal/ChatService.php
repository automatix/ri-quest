<?php
namespace App\Services\Process\Internal;

use App\Base\Entity\Chat;
use App\Base\Entity\ConcreteProcesses\WorkflowConcreteProcess;
use App\Base\Enums\Entities\ChatType;
use App\Base\Repositories\ChatRepository;
use App\Base\Repositories\ConcreteProcesses\WorkflowConcreteProcessRepository;
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
    /** @var WorkflowConcreteProcessRepository */
    private $workflowConcreteProcessRepository;
    /** @var UserServiceInterface */
    private $userService;

    public function __construct(ChatRepository $chatRepository, UserServiceInterface $userService, WorkflowConcreteProcessRepository $workflowConcreteProcessRepository)
    {
        $this->chatRepository = $chatRepository;
        $this->userService = $userService;
        $this->workflowConcreteProcessRepository = $workflowConcreteProcessRepository;
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
    public function findActiveWorkflowConcreteProcessForChat(Chat $chat): ?WorkflowConcreteProcess
    {
        /** @var WorkflowConcreteProcess $workflowConcreteProcess */
        $workflowConcreteProcess = $this->workflowConcreteProcessRepository->findOneBy([
            'chat' => $chat,
            // 'state' => IS NOT WorkflowState::FINISHED
        ]);
        return $workflowConcreteProcess;
    }

}
