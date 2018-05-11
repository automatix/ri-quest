<?php
namespace App\Process\HandlerRegistry;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use App\Base\Enums\Processes\States\AbstractProcessState;

/**
 * @package App\Process\StateEventHandlers
 * @author Ilya Khanataev <contact@mevatex.com>
 */
interface StateEventHandlerRegistryInterface
{


    /**
     * @param ProcessName $processName
     * @param AbstractProcessState $processState
     * @param EventName $eventName
     * @return callable
     */
    function get(ProcessName $processName, AbstractProcessState $processState, EventName $eventName) : callable;

}
