<?php
namespace App\Base\Repositories;

use App\Base\Entity\User;
use App\Base\Selectors\UserSelector;

class UserRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return User::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return UserSelector::class;
    }
    
}
