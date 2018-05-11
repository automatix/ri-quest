<?php
namespace App\Process;

use App\Process\ProcessEventHandlers\AccessProcessEventHandler;
use App\Process\ProcessEventHandlers\CompletionProcessEventHandler;
use App\Process\ProcessEventHandlers\PoiProcessEventHandler;
use App\Process\ProcessEventHandlers\ScenarioProcessEventHandler;
use App\Process\ProcessEventHandlers\StepProcessEventHandler;
use Psr\Container\ContainerInterface;

class SystemEventHandlerFactory
{

    public function create(ContainerInterface $container)
    {
        // The array index determines the priority and so the handling order!
        return new SystemEventHandler(
            $container->get(StepProcessEventHandler::class),
            $container->get(PoiProcessEventHandler::class),
            $container->get(ScenarioProcessEventHandler::class),
            $container->get(AccessProcessEventHandler::class),
            $container->get(CompletionProcessEventHandler::class)
        );
    }

}