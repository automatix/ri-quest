<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\AbstractEventName;

interface ResponsibleForEventInerface
{

    function isResponsibleFor(AbstractEventName $processEvent);

}