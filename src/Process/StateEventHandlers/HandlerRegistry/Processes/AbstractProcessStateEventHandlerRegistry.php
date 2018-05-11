<?php
namespace App\Process\StateEventHandlers\HandlerRegistry\Processes;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;

/**
 * @author Ilya Khanataev <contact@mevatex.com>
 * @package App\Process\StateEventHandlers\HandlerRegistry\Processes
 */
abstract class AbstractProcessStateEventHandlerRegistry
{

    /**
     * @return array
     */
    abstract function getStateEventHandlers() : array;

}
