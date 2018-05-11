<?php
namespace App\Process\HandlerRegistry\Processes;

use App\Base\Enums\Processes\States\AccessState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\HandlerRegistry\Processes\AbstractProcessStateEventHandlerRegistry;
use App\Process\StateEventHandlers\Scenario\StartedHandler;

class AccessStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $startedHandler
    ) {
        $this->stateEventHandlers = [
            AccessState::STARTED => $startedHandler,
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
