<?php
namespace App\Services\Process;

use App\Base\Entity\Chat;
use App\Base\Enums\Entities\ChatType;
use App\Base\Enums\ProcessName;

/**
 * Interface ChatServiceInterface
 *
 * @package App\Services\Process
 * @author Ilya Khanataev <contact@mevatex.com>
 */
interface ChatServiceInterface
{

    /**
     * @param int $identifier
     * @param ChatType $chatType
     * @return Chat
     */
    function findOneByIdentifierAndType(int $identifier, ChatType $chatType): ?Chat;

}
