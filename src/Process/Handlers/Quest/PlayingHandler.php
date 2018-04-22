<?php
namespace App\Services\Process\Internal\Handlers\Quest;

use App\Base\Enums\AbstractProcessEventType;
use App\Base\Enums\AbstractProcessState;
use App\Process\EventInStateHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class PlayingHandler implements EventInStateHandlerInterface
 *
 * @package App\Services\Process\Internal\Handlers\Quest
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class PlayingHandler implements EventInStateHandlerInterface
{

    function isResponsibleFor(AbstractProcessEventType $processEvent)
    {
        // TODO: Implement isResponsibleFor() method.
    }

    function handle(
        AbstractProcessState $processState,
        Event $event,
        string $eventType,
        EventDispatcherInterface $eventDispatcher
    ) {
        // TODO: Implement handle() method.
    }

}
