<?php
namespace App\Services\Process;

use App\Base\Entity\Chat;
use App\Base\Entity\ConcreteProcesses\WorkflowConcreteProcess;
use App\Base\Enums\Entities\ChatType;
use App\Base\Enums\ProcessName;

/**
 * Interface ChatServiceInterface
 *
 * @package App\Services\Process
 * @author Ilya Khanataev <contact@mevatex.com>
 */
interface ChatServiceInterface
{

    /**
     * @param int $identifier
     * @param ChatType $chatType
     * @return Chat
     */
    function findOneByIdentifierAndType(int $identifier, ChatType $chatType): ?Chat;

    /**
     * @param int $identifier
     * @param ChatType $chatType
     * @return Chat
     */
    function create(int $identifier, ChatType $chatType): ?Chat;

    /**
     * Provides the currently active WorkflowConcreteProcess
     * for the given Chat.
     * An "active" WorkflowConcreteProcess is one with state unequal WorkflowState::FINISHED.
     *
     * @param Chat $chat
     * @return WorkflowConcreteProcess|null
     */
    function findActiveWorkflowConcreteProcessForChat(Chat $chat): ?WorkflowConcreteProcess;

}
