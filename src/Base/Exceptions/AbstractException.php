<?php
namespace App\Base\Exceptions;

use Exception;

/**
 * Class AbstractException
 *
 * @package App\Base\Exceptions
 * @author Ilya Khanataev <contact@mevatex.com>
 */
abstract class AbstractException extends Exception
{

    public function __construct(string $message, AbstractErrorCode $code, Exception $previous = null)
    {
        parent::__construct(
            sprintf("ERROR: %s%'.03d", $this->getContext(), $code->getValue()) . ($message ? PHP_EOL . $message : null),
            $code->getValue(),
            $previous
        );
    }

    /**
     * @return string
     */
    public abstract function getContext();

    public function getContextCode()
    {
        return sprintf("%s%'.03d", $this->getContext(), $this->getCode());
    }

}
