<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\EventName;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface SystemEventHandlerInterface
{

    function handle(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher);

}
