<?php
namespace App\Base\Repositories\Plans;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Plans\PoiPlan;
use App\Base\Selectors\Processes\PoiSelector;

class PoiPlanRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return PoiPlan::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return PoiSelector::class;
    }
    
}
