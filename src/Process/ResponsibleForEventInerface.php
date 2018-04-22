<?php
namespace App\Process;

use App\Base\Enums\AbstractProcessEventType;

interface ResponsibleForEventInerface
{

    function isResponsibleFor(AbstractProcessEventType $processEvent);

}