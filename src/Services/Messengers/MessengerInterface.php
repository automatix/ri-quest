<?php
namespace App\Services\Messengers;

use App\Base\Messages\AbstractMessengerMessage;

/**
 * BotInterface
 *
 * @package App\Services\Messengers
 * @author Ilya Khanataev <contact@mevatex.com>
 */
interface MessengerInterface
{

    function sendMessage(AbstractMessengerMessage $messengerMessage);

}