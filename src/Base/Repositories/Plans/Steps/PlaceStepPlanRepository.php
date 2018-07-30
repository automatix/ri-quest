<?php
namespace App\Base\Repositories\Plans\Steps;

use App\Base\Entity\Plans\Steps\PlaceStepPlan;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\Processes\Steps\PlaceStepSelector;

class PlaceStepPlanRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return PlaceStepPlan::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return PlaceStepSelector::class;
    }
    
}
