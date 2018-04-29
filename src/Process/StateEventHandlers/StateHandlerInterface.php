<?php
namespace App\Process\StateEventHandlers;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface StateHandlerInterface
{

    function handle(Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher);

}