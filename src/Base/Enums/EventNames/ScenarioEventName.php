<?php
namespace App\Base\Enums\EventNames;

use App\Base\Enums\AbstractEnum;

/**
 * @method static ScenarioEventName ACCESS__FOO()
 * @method static ScenarioEventName COMPLETION__FOO()
 * @method static ScenarioEventName FOO()
 *
 * @package App\Base\Enums\EventNames
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class ScenarioEventName extends AbstractEnum
{

    const ACCESS__FOO = 'access.foo';
    const COMPLETION__FOO = 'completion.foo';
    const FOO = 'foo';

}
