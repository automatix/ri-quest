<?php
namespace App\Process;

use App\Process\ProcessEventHandlers\AccessProcessEventHandler;
use App\Process\ProcessEventHandlers\CompletionProcessEventHandler;
use App\Process\ProcessEventHandlers\PoiProcessEventHandler;
use App\Process\ProcessEventHandlers\ScenarioProcessEventHandler;
use App\Process\ProcessEventHandlers\StepProcessEventHandler;

class SystemEventHandlerFactory
{

    public function create(
        StepProcessEventHandler $stepProcessEventHandler,
        PoiProcessEventHandler $poiProcessEventHandler,
        ScenarioProcessEventHandler $scenarioProcessEventHandler,
        AccessProcessEventHandler $accessProcessEventHandler,
        CompletionProcessEventHandler $completionProcessEventHandler
    ) {
        // The array index determines the priority and so the handling order!
        return new SystemEventHandler(
            $stepProcessEventHandler,
            $poiProcessEventHandler,
            $scenarioProcessEventHandler,
            $accessProcessEventHandler,
            $completionProcessEventHandler
        );
    }

}