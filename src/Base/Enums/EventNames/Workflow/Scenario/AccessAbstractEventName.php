<?php
namespace App\Base\Enums\EventNames\Workflow\Scenario;

use App\Base\Enums\EventNames\AbstractEventName;

/**
 * @method static AccessAbstractEventName FOO()
 *
 * @package App\Base\Enums\EventNames\Workflow\Scenario
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class AccessAbstractEventName extends AbstractEventName
{

    const FOO = 'workflow.scenario.access:foo';

}
