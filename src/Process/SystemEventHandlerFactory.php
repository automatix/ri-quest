<?php
namespace App\Process;

use App\Process\ProcessEventHandlers\AccessHandler;
use App\Process\ProcessEventHandlers\CompletionHandler;
use App\Process\ProcessEventHandlers\PoiHandler;
use App\Process\ProcessEventHandlers\QuestHandler;
use App\Process\ProcessEventHandlers\StepHandler;
use Psr\Container\ContainerInterface;

class SystemEventHandlerFactory
{

    public function create(ContainerInterface $container)
    {
        // The array index determines the priority and so the handling order!
        return new SystemEventHandler(
            $container->get(StepHandler::class),
            $container->get(PoiHandler::class),
            $container->get(QuestHandler::class),
            $container->get(AccessHandler::class),
            $container->get(CompletionHandler::class)
        );
    }

}