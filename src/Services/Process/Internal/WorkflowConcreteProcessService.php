<?php
namespace App\Services\Process\Internal;

use App\Base\Entity\Chat;
use App\Base\Entity\ConcreteProcesses\WorkflowConcreteProcess;
use App\Base\Repository\UserRepository;
use App\Base\Repository\WorkflowConcreteProcessRepository;
use App\Services\Process\WorkflowConcreteProcessServiceInterface;

/**
 * @package App\Services\Process\Internal
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class WorkflowConcreteProcessService implements WorkflowConcreteProcessServiceInterface
{

    /** @var WorkflowConcreteProcessRepository */
    private $workflowConcreteProcessRepository;

    public function __construct(WorkflowConcreteProcessRepository $workflowConcreteProcessRepository)
    {
        $this->workflowConcreteProcessRepository = $workflowConcreteProcessRepository;
    }

    /**
     * @inheritdoc
     */
    public function create(Chat $chat): ?WorkflowConcreteProcess
    {
        $workflowConcreteProcess = (new WorkflowConcreteProcess())
            ->setChat($chat)
        ;
        $this->workflowConcreteProcessRepository->createEntity($workflowConcreteProcess);
        $chat->addWorkflowConcreteProcess($workflowConcreteProcess);
        return $workflowConcreteProcess;
    }

}
