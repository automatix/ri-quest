<?php
namespace App\Services\Process\Internal\StateHandlers\Quest;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class PlayingHandler extends AbstractStateEventHandler
 *
 * @package App\Services\Process\Internal\StateHandlers\Quest
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class PlayingHandler extends AbstractStateEventHandler
{

    public function handle(
        Event $event,
        AbstractEventName $eventName,
        EventDispatcherInterface $eventDispatcher
    ) {
        // TODO: Implement handle() method.
    }

}
