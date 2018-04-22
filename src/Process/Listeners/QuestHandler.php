<?php
namespace App\Process\Listeners;

use App\Base\Enums\AbstractProcessState;
use App\Process\StateHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class QuestHandler implements StateHandlerInterface
{

    public function handle(AbstractProcessState $processState, Event $event, string $eventType, EventDispatcherInterface $eventDispatcher)
    {
        // TODO: Implement handle() method.
    }

}
