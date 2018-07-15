<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\ProcessStates\StepState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\Step\AttemptFailedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\Step\AttemptMadeHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\Step\CanceledHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\Step\CompletedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\Step\FailedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\Step\FinishedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\Step\QuestionAskedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\Step\StartedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\Step\TaskAssignedHandler;

class StepStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $startedHandler,
        TaskAssignedHandler $taskAssignedHandler,
        QuestionAskedHandler $questionAskedHandler,
        AttemptMadeHandler $attemptMadeHandler,
        CanceledHandler $canceledHandler,
        AttemptFailedHandler $attemptFailedHandler,
        FailedHandler $failedHandler,
        CompletedHandler $completedHandler,
        FinishedHandler $finishedHandler
    ) {
        $this->stateEventHandlers = [
            StepState::STARTED => $startedHandler,
            StepState::TASK_ASSIGNED => $taskAssignedHandler,
            StepState::QUESTION_ASKED => $questionAskedHandler,
            StepState::ATTEMPT_MADE => $attemptMadeHandler,
            StepState::CANCELED => $canceledHandler,
            StepState::ATTEMPT_FAILED => $attemptFailedHandler,
            StepState::FAILED => $failedHandler,
            StepState::COMPLETED => $completedHandler,
            StepState::FINISHED => $finishedHandler,
        ];
    }

    /**
     * @return array
     */
    public function getStateEventHandlers() : array
    {
        return $this->stateEventHandlers;
    }

}
