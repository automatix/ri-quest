<?php
namespace App\Process\HandlerRegistry\Registries;

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
