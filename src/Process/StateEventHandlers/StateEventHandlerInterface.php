<?php
namespace App\Process\StateEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface StateEventHandlerInterface
{

    function handle(Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher);

}
