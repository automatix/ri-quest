<?php
namespace App\Services\Process\Internal;

use App\Base\Entity\Chat;
use App\Base\Enums\Entities\ChatType;
use App\Base\Repository\ChatRepository;
use App\Services\Process\ChatServiceInterface;

/**
 * @package App\Services\Process\Internal
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class ChatService implements ChatServiceInterface
{

    /** @var ChatRepository */
    private $chatRepository;

    public function __construct(ChatRepository $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }

    /**
     * @param int $identifier
     * @param ChatType $chatType
     * @return Chat
     */
    public function findOneByIdentifierAndType(int $identifier, ChatType $chatType): ?Chat
    {
        return $this->chatRepository->findOneByIdentifierAndType($identifier, $chatType);
    }

}
