<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\ProcessStates\StepState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\HandlerRegistry\Registries\AbstractProcessStateEventHandlerRegistry;
use App\Process\StateEventHandlers\Scenario\Poi\Step\StartedHandler;

class StepStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $startedHandler
    ) {
        $this->stateEventHandlers = [
            StepState::STARTED => $startedHandler,
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
