<?php
namespace App\Process;

use App\Base\Enums\Processes\EventTypes\AbstractEventType;
use App\Base\Enums\Processes\States\AbstractProcessState;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface StateHandlerInterface
{

    function handle(AbstractProcessState $processState, Event $event, AbstractEventType $eventType, EventDispatcherInterface $eventDispatcher);

}