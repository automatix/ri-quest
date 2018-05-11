<?php
namespace App\Base\Exceptions;

/**
 * Class EnumErrorContextCode
 *
 * @method static EventHandlingErrorContextCode GENERAL_ERROR()
 * @method static EventHandlingErrorContextCode NO_STATE_HANDLER_FOUND()
 * @method static EventHandlingErrorContextCode NO_STATE_EVENT_HANDLER_FOUND()
 */
class EventHandlingErrorContextCode extends AbstractErrorCode
{

    const GENERAL_ERROR = 1;
    const NO_STATE_HANDLER_FOUND = 2;
    const NO_STATE_EVENT_HANDLER_FOUND = 3;

}
