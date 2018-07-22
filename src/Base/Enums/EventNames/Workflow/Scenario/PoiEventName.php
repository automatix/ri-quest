<?php
namespace App\Base\Enums\EventNames\Workflow\Scenario;

use App\Base\Enums\EventNames\AbstractEventName;

/**
 * @method static PoiEventName FOO()
 *
 * @package App\Base\Enums\EventNames
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class PoiEventName extends AbstractEventName
{

    const FOO = 'workflow.scenario.poi:foo';

}
