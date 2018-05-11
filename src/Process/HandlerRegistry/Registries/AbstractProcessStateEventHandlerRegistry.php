<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;

/**
 * @author Ilya Khanataev <contact@mevatex.com>
 * @package App\Process\HandlerRegistry\Registries
 */
abstract class AbstractProcessStateEventHandlerRegistry
{

    /**
     * @return array
     */
    abstract function getStateEventHandlers() : array;

}
