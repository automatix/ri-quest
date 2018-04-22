<?php
namespace App\Process\Listeners;

use App\Base\Enums\AbstractProcessEventType;
use App\Base\Enums\AbstractProcessState;
use App\Process\EventInStateHandlerInterface;
use App\Process\StateHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class StepHandler implements StateHandlerInterface
{

    /** @var EventInStateHandlerInterface[] */
    private $eventInStateHandlers;

    public function handle(AbstractProcessState $processState, Event $event, AbstractProcessEventType $eventType, EventDispatcherInterface $eventDispatcher)
    {
        foreach ($this->eventInStateHandlers as $handler) {
            if ($handler->isResponsibleFor($eventType)) {
                $handler->handle($processState, $event, $eventType, $eventDispatcher);
            }
        }
    }

}
