<?php
namespace App\Process;

use App\Base\Enums\AbstractProcessEventType;
use App\Base\Enums\AbstractProcessState;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface StateHandlerInterface
{

    function handle(AbstractProcessState $processState, Event $event, AbstractProcessEventType $eventType, EventDispatcherInterface $eventDispatcher);

}