<?php
namespace App\Services\Process;

use App\Base\Entity\Chat;
use App\Base\Entity\Processes\WorkflowProcess;
use App\Base\Enums\Entities\ChatType;

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
     * Provides the currently active WorkflowProcess
     * for the given Chat.
     * An "active" WorkflowProcess is one with state unequal WorkflowState::FINISHED.
     *
     * @param Chat $chat
     * @return WorkflowProcess|null
     */
    function findActiveWorkflowProcessForChat(Chat $chat): ?WorkflowProcess;

}
