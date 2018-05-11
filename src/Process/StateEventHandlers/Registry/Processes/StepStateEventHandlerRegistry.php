<?php
namespace App\Process\StateEventHandlers\Registry\Processes;

use App\Base\Enums\Processes\States\StepState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\StateEventHandlers\Registry\Processes\AbstractProcessStateEventHandlerRegistry;
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

}
