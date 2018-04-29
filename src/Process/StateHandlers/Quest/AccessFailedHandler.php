<?php
namespace App\Services\Process\Internal\StateHandlers\Quest;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Process\StateHandlers\StateHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class AccessFailedHandler implements StateHandlerInterface
 *
 * @package App\Services\Process\Internal\StateHandlers\Quest
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class AccessFailedHandler implements StateHandlerInterface
{

    public function handle(
        Event $event,
        AbstractEventName $eventName,
        EventDispatcherInterface $eventDispatcher
    ) {
        // TODO: Implement handle() method.
    }

}
