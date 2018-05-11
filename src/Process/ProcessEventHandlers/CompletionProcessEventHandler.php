<?php
namespace App\Process\ProcessEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CompletionProcessEventHandler extends AbstractProcessEventHandler
{

    const RELEVANT_PROCESS_HANDLER_SUB_NAMESPACE = self::ROOT_PROCESS_HANDLER_NAMESPACE . '\Scenario\Completion';

    public function handle(Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $currentState = $this->getStateManagingService()->detectCompletionState();
        $concreteHandler = $this->buildConcreteHandler(ProcessName::COMPLETION(), $currentState, $eventName);
        call_user_func($concreteHandler, $event, $eventName, $eventDispatcher);
    }

}
