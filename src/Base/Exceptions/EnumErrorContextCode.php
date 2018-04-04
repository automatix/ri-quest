<?php
namespace App\Base\Exceptions;

/**
 * Class EnumErrorContextCode
 *
 * @method static EnumErrorContextCode GENERAL_ERROR()
 * @method static EnumErrorContextCode IVALID_KEY()
 */
class EnumErrorContextCode extends AbstractErrorCode
{

    const GENERAL_ERROR = 1;
    const IVALID_KEY = 2;

}
