<?php
namespace App\Base\Repositories\Plans;

use App\Base\Entity\Plans\AccessPlan;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\Processes\AccessSelector;

class AccessPlanRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return AccessPlan::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AccessSelector::class;
    }
    
}
