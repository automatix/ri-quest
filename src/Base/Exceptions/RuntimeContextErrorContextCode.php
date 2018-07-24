<?php
namespace App\Base\Exceptions;

/**
 * Class EnumErrorContextCode
 *
 * @method static RuntimeContextErrorContextCode GENERAL_ERROR()
 * @method static RuntimeContextErrorContextCode RUNTIME_CONTEXT_NOT_INITIALIZED()
 */
class RuntimeContextErrorContextCode extends AbstractErrorCode
{

    const GENERAL_ERROR = 1;
    const RUNTIME_CONTEXT_NOT_INITIALIZED = 2;

}
