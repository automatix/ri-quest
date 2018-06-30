<?php
namespace App\Base\Enums\EventNames;

use App\Base\Enums\AbstractEnum;

/**
 * @method static GeneralEventName FOO()
 * @method static GeneralEventName USER_MESSAGE_RECEIVED()
 *
 * @package App\Base\Enums\EventNames
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class GeneralEventName extends AbstractEnum
{

    const FOO = 'general:foo';
    const USER_MESSAGE_RECEIVED = 'general:user_message_received';

}
