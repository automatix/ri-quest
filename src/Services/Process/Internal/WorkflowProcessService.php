<?php
namespace App\Services\Process\Internal;

use App\Base\Entity\Chat;
use App\Base\Entity\Processes\WorkflowProcess;
use App\Base\Repositories\Plans\WorkflowPlanRepository;
use App\Services\Process\WorkflowProcessServiceInterface;

/**
 * @package App\Services\Process\Internal
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class WorkflowProcessService implements WorkflowProcessServiceInterface
{

    /** @var WorkflowPlanRepository */
    private $workflowProcessRepository;

    public function __construct(WorkflowPlanRepository $workflowPlanRepository)
    {
        $this->workflowProcessRepository = $workflowPlanRepository;
    }

    /**
     * @inheritdoc
     */
    public function create(Chat $chat): ?WorkflowProcess
    {
        $workflowProcess = (new WorkflowProcess())
            ->setChat($chat)
        ;
        $this->workflowProcessRepository->createEntity($workflowProcess);
        $chat->addWorkflowProcess($workflowProcess);
        return $workflowProcess;
    }

}
