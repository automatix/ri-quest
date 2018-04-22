<?php
namespace App\Process;

use App\Base\Enums\Processes\EventTypes\AbstractEventType;

interface ResponsibleForEventInerface
{

    function isResponsibleFor(AbstractEventType $processEvent);

}