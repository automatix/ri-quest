<?php
namespace App\Process\ProcessEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Base\Exceptions\EventHandlingException;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class StepProcessEventHandler extends AbstractProcessEventHandler
{

    const RELEVANT_PROCESS_HANDLER_SUB_NAMESPACE = self::ROOT_PROCESS_HANDLER_NAMESPACE . '\Scenario\Poi\Step';

    public function handle(Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $currentState = $this->getStateManagingService()->detectStepState();
        try {
            $concreteHandler = $this->buildConcreteHandler(ProcessName::STEP(), $currentState, $eventName);
            call_user_func($concreteHandler, $event, $eventName, $eventDispatcher);
        } catch (EventHandlingException $e) {
            $breakpoint = null;
            // do nothing...
        }
    }

}
