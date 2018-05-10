<?php
namespace App\Process\StateEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\States\AbstractProcessState;

/**
 * @package App\Process\StateEventHandlers
 * @author Ilya Khanataev <contact@mevatex.com>
 */
interface StateEventHandlerRegistryInterface
{


    /**
     * @param AbstractProcessState $processState
     * @param EventName $eventName
     * @return AbstractStateEventHandler
     */
    function get(AbstractProcessState $processState, EventName $eventName) : AbstractStateEventHandler;

}
