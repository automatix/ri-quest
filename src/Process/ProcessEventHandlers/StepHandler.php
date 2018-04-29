<?php
namespace App\Process\ProcessEventHandlers;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class StepHandler extends AbstractProcessEventHandler
{

    const RELEVANT_STATE_HANDLER_NAMESPACE = '\App\Services\Process\Internal\StateHandlers\Step';

    public function handle(Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $currentState = $this->getStateManagingService()->detectStepState();
        $concreteHandler = $this->buildConcreteHandler($currentState, $eventName);
        call_user_func($concreteHandler, $event, $eventName, $eventDispatcher);
    }

}
