<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface StateHandlerInterface
{

    function handle(AbstractProcessState $currentState, Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher);

}