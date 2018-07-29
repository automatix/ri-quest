<?php
namespace App\Base\Repositories\Plans\Steps;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Plans\Steps\InfoStepPlan;
use App\Base\Selectors\Processes\Steps\InfoStepSelector;

class InfoStepPlanRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return InfoStepPlan::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return InfoStepSelector::class;
    }
    
}
