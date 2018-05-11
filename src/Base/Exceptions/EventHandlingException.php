<?php
namespace App\Base\Exceptions;

use Exception;

/**
 * Class EventHandlingException
 */
class EventHandlingException extends AbstractException
{

    public function __construct($message = '', EventHandlingErrorContextCode $code, Exception $previous = null)
    {
        if ($code === null) {
            $code = EventHandlingErrorContextCode::GENERAL_ERROR();
        }
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return "EVENT";
    }

}
