<?php
namespace App\Services\Process;

use App\Base\Entity\Chat;
use App\Base\Entity\ConcreteProcesses\WorkflowConcreteProcess;
use App\Base\Entity\User;

/**
 * Interface WorkflowConcreteProcessServiceInterface
 *
 * @package App\Services\Process
 * @author Ilya Khanataev <contact@mevatex.com>
 */
interface WorkflowConcreteProcessServiceInterface
{

    /**
     * @param Chat $chat
     * @return WorkflowConcreteProcess|null
     */
    function create(Chat $chat): ?WorkflowConcreteProcess;

}
