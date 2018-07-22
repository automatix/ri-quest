<?php
namespace App\Process;

use App\Base\Enums\ProcessName;
use App\Base\Exceptions\EventHandlingException;
use App\Process\HandlerRegistry\StateEventHandlerRegistryInterface;
use App\Services\Process\ProcessManagingServiceInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class AccessEventHandler extends AbstractEventHandler
{

    protected function getProcessNames()
    {
        // The array index determines the priority and so the handling order!
        // Means: The the order in the list is actually the priority.
        return [
            ProcessName::ACCESS => ProcessName::ACCESS(),
        ];
    }

}
