<?php
namespace App\Base\Exceptions;

use Exception;

/**
 * Class RuntimeContextException
 */
class RuntimeContextException extends AbstractException
{

    public function __construct($message = '', RuntimeContextErrorContextCode $code, Exception $previous = null)
    {
        if ($code === null) {
            $code = RuntimeContextErrorContextCode::GENERAL_ERROR();
        }
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return "RTC";
    }

}
