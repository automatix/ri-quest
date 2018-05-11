<?php
namespace App\Process\StateEventHandlers\HandlerRegistry\Processes;

use App\Base\Enums\Processes\States\PoiState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\StateEventHandlers\HandlerRegistry\Processes\AbstractProcessStateEventHandlerRegistry;
use App\Process\StateEventHandlers\Scenario\Poi\StartedHandler;

class PoiStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $poiStartedHandler,
        StartedHandler $poiStepStartedHandler
    ) {
        $this->stateEventHandlers = [
            PoiState::STARTED => $poiStartedHandler,
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
