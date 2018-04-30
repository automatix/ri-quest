<?php
namespace App\Process\StateEventHandlers\Quest;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class AccessFailedHandler extends AbstractStateEventHandler
 *
 * @package App\Services\Process\Internal\StateHandlers\Quest
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class AccessFailedHandler extends AbstractStateEventHandler
{

    public function handle(
        Event $event,
        EventName $eventName,
        EventDispatcherInterface $eventDispatcher
    ) {
        // TODO: Implement handle() method.
    }

}
