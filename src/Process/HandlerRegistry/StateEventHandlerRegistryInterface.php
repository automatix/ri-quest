<?php
namespace App\Process\HandlerRegistry;

use App\Base\Enums\EventNames\GeneralEventName;
use App\Base\Enums\ProcessName;
use App\Base\Enums\States\AbstractProcessState;

/**
 * @package App\Process\StateEventHandlers
 * @author Ilya Khanataev <contact@mevatex.com>
 */
interface StateEventHandlerRegistryInterface
{


    /**
     * @param ProcessName $processName
     * @param AbstractProcessState $processState
     * @param string $eventName
     * @return callable
     */
    function get(ProcessName $processName, AbstractProcessState $processState, string $eventName) : callable;

}
