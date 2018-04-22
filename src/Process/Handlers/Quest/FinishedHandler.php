<?php
namespace App\Services\Process\Internal\Handlers\Quest;

use App\Base\Enums\Processes\EventTypes\AbstractEventType;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Process\EventInStateHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class FinishedHandler implements EventInStateHandlerInterface
 *
 * @package App\Services\Process\Internal\Handlers\Quest
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class FinishedHandler implements EventInStateHandlerInterface
{

    function isResponsibleFor(AbstractEventType $processEvent)
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
