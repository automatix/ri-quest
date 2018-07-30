<?php
namespace App\Base\Repositories\Plans\Steps;

use App\Base\Entity\Plans\Steps\TaskStepPlan;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\Processes\Steps\TaskStepSelector;

class TaskStepPlanRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return TaskStepPlan::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return TaskStepSelector::class;
    }
    
}
