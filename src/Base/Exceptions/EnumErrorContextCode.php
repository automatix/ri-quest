<?php
namespace App\Base\Exceptions;

/**
 * Class EnumErrorContextCode
 *
 * @method static EnumErrorContextCode GENERAL_ERROR()
 * @method static EnumErrorContextCode INVALID_KEY()
 */
class EnumErrorContextCode extends AbstractErrorCode
{

    const GENERAL_ERROR = 1;
    const INVALID_KEY = 2;

}
