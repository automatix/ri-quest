<?php
namespace App\Base\Repositories\Processes;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Processes\Access;
use App\Base\Selectors\Processes\AccessSelector;

class AccessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return Access::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AccessSelector::class;
    }
    
}
