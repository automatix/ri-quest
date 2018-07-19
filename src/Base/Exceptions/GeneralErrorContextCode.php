<?php
namespace App\Base\Exceptions;

/**
 * Class GeneralErrorContextCode
 *
 * @method static GeneralErrorContextCode GENERAL_ERROR()
 * @method static GeneralErrorContextCode INVALID_ARGUMENT()
 */
class GeneralErrorContextCode extends AbstractErrorCode
{

    const GENERAL_ERROR = 1;
    const INVALID_ARGUMENT = 2;

}
