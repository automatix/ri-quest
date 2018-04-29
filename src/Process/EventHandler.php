<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Process\StateHandlers\StateHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class EventHandler implements EventHandlerInterface
{

    /** @var StateHandlerInterface[] */
    private $stateHandlers;

    public function __construct(... $listeners)
    {
        $this->stateHandlers = $listeners;
    }

    public function handle(Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $eventType = AbstractEventName::search($eventName);
        foreach ($this->stateHandlers as $handler) {
            $handler->handle($event, $eventType, $eventDispatcher);
        }
    }

}
