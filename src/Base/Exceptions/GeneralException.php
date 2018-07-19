<?php
namespace App\Base\Exceptions;

use Exception;

/**
 * Class GeneralException
 */
class GeneralException extends AbstractException
{

    public function __construct($message = '', GeneralErrorContextCode $code, Exception $previous = null)
    {
        if ($code === null) {
            $code = GeneralErrorContextCode::GENERAL_ERROR();
        }
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return "GEN";
    }

}
