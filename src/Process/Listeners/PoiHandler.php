<?php
namespace App\Process\Listeners;

use App\Base\Enums\AbstractProcessEventType;
use App\Base\Enums\AbstractProcessState;
use App\Process\StateHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class PoiHandler implements StateHandlerInterface
{

    public function handle(AbstractProcessState $processState, Event $event, AbstractProcessEventType $eventType, EventDispatcherInterface $eventDispatcher)
    {
        // TODO: Implement handle() method.
    }

}
