<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\ProcessStates\ScenarioState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\FinishedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\IntroSentHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\PoiProcessingHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\StartedHandler;

class ScenarioStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $startedHandler,
        IntroSentHandler $introSentHandler,
        PoiProcessingHandler $poiProcessingHandler,
        FinishedHandler $finishedHandler
    ) {
        $this->stateEventHandlers = [
            ScenarioState::STARTED => $startedHandler,
            ScenarioState::INTRO_SENT => $introSentHandler,
            ScenarioState::POI_PROCESSING => $poiProcessingHandler,
            ScenarioState::FINISHED => $finishedHandler,
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
