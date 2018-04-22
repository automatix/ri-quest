<?php
namespace App\Process\Listeners;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Process\EventInStateHandlerInterface;
use App\Process\StateHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class StepHandler implements StateHandlerInterface
{

    /** @var EventInStateHandlerInterface[] */
    private $eventInStateHandlers;

    public function handle(AbstractProcessState $processState, Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        foreach ($this->eventInStateHandlers as $handler) {
            if ($handler->isResponsibleFor($eventName)) {
                $handler->handle($processState, $event, $eventName, $eventDispatcher);
            }
        }
    }

}
