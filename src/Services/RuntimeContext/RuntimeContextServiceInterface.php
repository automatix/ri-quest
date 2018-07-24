<?php
namespace App\Services\RuntimeContext;

use App\Base\Entity\Chat;
use App\Base\Entity\User;
use App\Base\Selectors\ChatSelector;

interface RuntimeContextServiceInterface
{

    /**
     * @param Chat $chat
     * @return void
     */
    function initializeRuntimeContext(Chat $chat): void;

    /**
     * @return User
     */
    function getCurrentUser(): User;

    /**
     * @return Chat
     */
    function getCurrentChat(): Chat;

}
