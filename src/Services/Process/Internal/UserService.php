<?php
namespace App\Services\Process\Internal;

use App\Base\Entity\User;
use App\Base\Repositories\UserRepository;
use App\Services\Process\UserServiceInterface;

/**
 * @package App\Services\Process\Internal
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class UserService implements UserServiceInterface
{

    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @inheritdoc
     */
    public function create(): ?User
    {
        $user = (new User());
        $this->userRepository->createEntity($user);
        return $user;
    }

}
