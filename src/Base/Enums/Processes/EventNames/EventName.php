<?php
namespace App\Base\Enums\Processes\EventNames;

use App\Base\Enums\AbstractEnum;

/**
 * @method static EventName USER_MESSAGE_RECEIVED()
 * @method static EventName ACCESS_FOO()
 * @method static EventName COMPLETION_FOO()
 * @method static EventName STEP_FOO()
 * @method static EventName POI_FOO()
 * @method static EventName ROUTE_FOO()
 *
 * @package App\Base\Enums\Processes\EventNames
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class EventName extends AbstractEnum
{

    const USER_MESSAGE_RECEIVED = 'general.user_message_received';
    const ACCESS_FOO = 'access.foo';
    const COMPLETION_FOO = 'completion.foo';
    const STEP_FOO = 'step.foo';
    const POI_FOO = 'poi.foo';
    const ROUTE_FOO = 'ruote.foo';

}
