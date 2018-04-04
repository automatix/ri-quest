<?php
namespace App\Base\Enums;

use App\Base\Exceptions\EnumErrorContextCode;
use App\Base\Exceptions\EnumException;
use MyCLabs\Enum\Enum as MyCLabsEnum;
use BadMethodCallException;

/**
 * Class Enum
 */
abstract class AbstractEnum extends MyCLabsEnum
{

    /**
     * Overrides the according method of the super class
     * to allow the NULL value for constants.
     *
     * @inheritdoc
     */
    public static function __callStatic($name, $arguments)
    {
        $array = static::toArray();
        if (! array_key_exists($name, $array)) {
            throw new BadMethodCallException("No static method or enum constant '$name' in class " . get_called_class());

        }
        return new static($array[$name]);
    }

    /**
     * Searches for the constant name key
     * and returns the according Enum object, if found.
     *
     * @param $key
     * @return AbstractEnum
     * @throws EnumException If the constant $key is not given in the Enum.
     */
    public static function getObjectByKey($key)
    {
        if (! self::isValidKey($key)) {
            throw new EnumException(
                'The given key "' . $key . '" is invalid for the Enum ' . static::class . '.',
                EnumErrorContextCode::IVALID_KEY()
            );
        }

        $return = null;
        $enumArray = self::toArray();
        foreach ($enumArray as $enumKey => $enumValue) {
            if ($enumKey === $key) {
                $return = self::values()[$enumKey];
                break;
            }
        }

        return $return;
    }

}
