<?php
namespace App\Process\StateEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\States\AbstractProcessState;

class StateEventHandlerRegistry implements StateEventHandlerRegistryInterface
{

    public function __construct(
        
    ) {

    }

    /**
     * @param AbstractProcessState $processState
     * @param EventName $eventName
     * @return AbstractStateEventHandler
     */
    public function get(AbstractProcessState $processState, EventName $eventName): AbstractStateEventHandler
    {

    }

}
