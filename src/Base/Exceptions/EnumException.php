<?php
namespace App\Base\Exceptions;

use Exception;

/**
 * Class EnumException
 */
class EnumException extends AbstractException
{

    public function __construct($message = '', EnumErrorContextCode $code, Exception $previous = null)
    {
        if ($code === null) {
            $code = EnumErrorContextCode::GENERAL_ERROR();
        }
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return "ENUM";
    }

}
