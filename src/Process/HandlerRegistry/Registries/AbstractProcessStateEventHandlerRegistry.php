<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\EventNames\GeneralEventName;
use App\Base\Enums\ProcessName;
use App\Base\Enums\States\AbstractProcessState;
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
