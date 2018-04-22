<?php
namespace App\Services\Process\Internal\Handlers\Quest;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Process\StateHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class AccessProcessingHandler implements StateHandlerInterface
 *
 * @package App\Services\Process\Internal\Handlers\Quest
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class AccessProcessingHandler implements StateHandlerInterface
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
