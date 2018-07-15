<?php
namespace App\Process\StateEventHandlers\Workflow\Scenario\Poi\Step;

use App\Base\Enums\EventNames\GeneralEventName;
use App\Base\Enums\EventNames\Workflow\Scenario\Poi\StepAbstractEventName;
use App\Base\Events\GenericEvent;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class StartedHandler extends AbstractStateEventHandler
 *
 * @package App\Services\Process\Internal\StateHandlers\Scenario\Poi\Step
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class AttemptMadeHandler extends AbstractStateEventHandler
{

}
