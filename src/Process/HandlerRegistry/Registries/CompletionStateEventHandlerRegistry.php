<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\Processes\States\CompletionState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\HandlerRegistry\Registries\AbstractProcessStateEventHandlerRegistry;
use App\Process\StateEventHandlers\Scenario\Completion\StartedHandler;

class CompletionStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $startedHandler
    ) {
        $this->stateEventHandlers = [
            CompletionState::STARTED => $startedHandler,
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
