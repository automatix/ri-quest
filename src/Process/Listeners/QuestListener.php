<?php
namespace App\Process\Listeners;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Process\StateHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class QuestListener extends AbstractProcessListener
{

    public function handle(AbstractProcessState $processState, Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        // TODO: Implement handle() method.
    }

}
