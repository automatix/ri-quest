<?php
namespace App\Services\Process;

use App\Base\Entity\User;

/**
 * Interface UserServiceInterface
 *
 * @package App\Services\Process
 * @author Ilya Khanataev <contact@mevatex.com>
 */
interface UserServiceInterface
{

    /**
     * @return User
     */
    function create(): ?User;

}
