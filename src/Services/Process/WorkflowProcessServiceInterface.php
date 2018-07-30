<?php
namespace App\Services\Process;

use App\Base\Entity\Chat;
use App\Base\Entity\Processes\WorkflowProcess;

/**
 * Interface WorkflowProcessServiceInterface
 *
 * @package App\Services\Process
 * @author Ilya Khanataev <contact@mevatex.com>
 */
interface WorkflowProcessServiceInterface
{

    /**
     * @param Chat $chat
     * @return WorkflowProcess|null
     */
    function create(Chat $chat): ?WorkflowProcess;

}
