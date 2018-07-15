<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\ProcessStates\CompletionState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Completion\FinishedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Completion\StartedHandler;

class CompletionStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $startedHandler,
        FinishedHandler $finishedHandler
    ) {
        $this->stateEventHandlers = [
            CompletionState::STARTED => $startedHandler,
            CompletionState::FINISHED => $finishedHandler,
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
