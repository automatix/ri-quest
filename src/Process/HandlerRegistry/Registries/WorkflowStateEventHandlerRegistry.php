<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\ProcessStates\WorkflowState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\StateEventHandlers\Workflow\AccessFailedHandler;
use App\Process\StateEventHandlers\Workflow\IntroSentHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\FinishedHandler;
use App\Process\StateEventHandlers\Workflow\AccessProcessinHandler;
use App\Process\StateEventHandlers\Workflow\CompletionProcessingHandler;
use App\Process\StateEventHandlers\Workflow\AccessOkHandler;
use App\Process\StateEventHandlers\Workflow\ScenarioProcessingHandler;
use App\Process\StateEventHandlers\Workflow\StartedHandler;

class WorkflowStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $startedHandler,
        IntroSentHandler $introSentHandler,
        AccessProcessinHandler $accessProcessingHandler,
        AccessFailedHandler $accessFailedHandler,
        AccessOkHandler $accessOkHandler,
        ScenarioProcessingHandler $scenarioProcessingHandler,
        CompletionProcessingHandler $completionProcessingHandler,
        FinishedHandler $finishedHandler
    ) {
        $this->stateEventHandlers = [
            WorkflowState::STARTED => $startedHandler,
            WorkflowState::INTRO_SENT => $introSentHandler,
            WorkflowState::ACCESS_PROCESSING => $accessProcessingHandler,
            WorkflowState::ACCESS_FAILED => $accessFailedHandler,
            WorkflowState::ACCESS_OK => $accessOkHandler,
            WorkflowState::SCENARIO_PROCESSING => $scenarioProcessingHandler,
            WorkflowState::COMPLETION_PROCESSING => $completionProcessingHandler,
            WorkflowState::FINISHED => $finishedHandler,
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
