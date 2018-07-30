<?php
namespace App\Base\Repositories\Plans;

use App\Base\Entity\Plans\WorkflowPlan;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\Processes\WorkflowSelector;

class WorkflowPlanRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return WorkflowPlan::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return WorkflowSelector::class;
    }
    
}
