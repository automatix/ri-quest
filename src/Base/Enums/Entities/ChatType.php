<?php
namespace App\Base\Enums\Entities;

use App\Base\Enums\AbstractEnum;

/**
 * @method static ChatType TELEGRAM()
 * @method static ChatType FACEBOOK()
 *
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class ChatType extends AbstractEnum
{

    const TELEGRAM = 'telegram';
    const FACEBOOK = 'facebook';

}
