<?php
namespace App\Base\Enums\EventNames\Scenario;

use App\Base\Enums\EventNames\EventName;

/**
 * @method static AccessEventName FOO()
 *
 * @package App\Base\Enums\EventNames\Scenario
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class AccessEventName extends EventName
{

    const FOO = 'scenario.access:foo';

}
