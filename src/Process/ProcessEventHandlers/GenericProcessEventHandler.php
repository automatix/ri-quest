<?php
namespace App\Process\ProcessEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Base\Exceptions\EventHandlingException;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class GenericProcessEventHandler extends AbstractProcessEventHandler
{

    public function handle(ProcessName $processName, Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $currentState = $this->getStateManagingService()->detectProcessState($processName);
        try {
            $concreteHandler = $this->getEventHandlerRegistry()->get($processName, $currentState, $eventName);
            call_user_func($concreteHandler, $event, $eventName, $eventDispatcher);
        } catch (EventHandlingException $e) {
            $breakpoint = null;
            // do nothing...
        }
    }

}
