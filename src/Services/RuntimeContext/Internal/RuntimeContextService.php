<?php
namespace App\Services\RuntimeContext\Internal;

use App\Base\Entity\Chat;
use App\Base\Entity\User;
use App\Base\Exceptions\RuntimeContextErrorContextCode;
use App\Base\Exceptions\RuntimeContextException;
use App\Services\Process\ChatServiceInterface;
use App\Services\RuntimeContext\RuntimeContextServiceInterface;

class RuntimeContextService implements RuntimeContextServiceInterface
{

    /** @var Chat */
    private $chat;
    /** @var ChatServiceInterface */
    private $chatService;

    public function __construct(ChatServiceInterface $chatService)
    {
        $this->chatService = $chatService;
    }

    public function initializeRuntimeContext(Chat $chat): void
    {
        $this->chat = $chat;
    }

    public function getCurrentUser(): User
    {
        return $this->getCurrentChat()->getUser();
    }

    public function getCurrentChat(): Chat
    {
        if (! $this->chat) {
            throw new RuntimeContextException('', RuntimeContextErrorContextCode::RUNTIME_CONTEXT_NOT_INITIALIZED());
        }
        return $this->chat;
    }

}
