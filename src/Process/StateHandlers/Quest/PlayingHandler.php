<?php
namespace App\Services\Process\Internal\StateHandlers\Quest;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Process\StateHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class PlayingHandler implements StateHandlerInterface
 *
 * @package App\Services\Process\Internal\StateHandlers\Quest
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class PlayingHandler implements StateHandlerInterface
{

    public function handle(
        AbstractProcessState $processState,
        Event $event,
        AbstractEventName $eventName,
        EventDispatcherInterface $eventDispatcher
    ) {
        // TODO: Implement handle() method.
    }

}
