<?php
namespace App\Process\ProcessEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Base\Exceptions\EventHandlingException;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ScenarioProcessEventHandler extends AbstractProcessEventHandler
{

    public function handle(Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $currentState = $this->getStateManagingService()->detectScenarioState();
        try {
            $concreteHandler = $this->getEventHandlerRegistry()->get(ProcessName::SCENARIO(), $currentState, $eventName);
            call_user_func($concreteHandler, $event, $eventName, $eventDispatcher);
        } catch (EventHandlingException $e) {
            $breakpoint = null;
            // do nothing...
        }
    }

}
