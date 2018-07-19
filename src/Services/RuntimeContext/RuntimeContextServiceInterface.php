<?php
namespace App\Services\RuntimeContext;

use App\Base\Entity\Chat;
use App\Base\Entity\User;
use App\Base\Selectors\ChatSelector;

interface RuntimeContextServiceInterface
{

    /**
     * @param User $user
     * @param Chat $chat
     * @return void
     */
    function initializeRuntimeContext(ChatSelector $chatSelector);

    /**
     * @return User
     */
    function getCurrentUser();

    /**
     * @return Chat
     */
    function getCurrentChat();

}
