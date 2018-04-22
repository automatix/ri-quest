<?php
namespace App\Process\Listeners;

use App\Base\Enums\Processes\EventTypes\AbstractEventType;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Process\StateHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class PoiHandler implements StateHandlerInterface
{

    public function handle(AbstractProcessState $processState, Event $event, AbstractEventType $eventType, EventDispatcherInterface $eventDispatcher)
    {
        // TODO: Implement handle() method.
    }

}
