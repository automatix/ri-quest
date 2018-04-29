<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ProcessHandler implements EventListenerInterface
{

    /** @var StateHandlerInterface[] */
    private $handlers;

    public function __construct(... $listeners)
    {
        $this->handlers = $listeners;
    }

    public function handle(Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $eventType = AbstractEventName::search($eventName);
        foreach ($this->handlers as $handler) {
            $handler->handle($event, $eventType, $eventDispatcher);
        }
    }

}
