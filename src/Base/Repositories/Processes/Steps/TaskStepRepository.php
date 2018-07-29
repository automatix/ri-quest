<?php
namespace App\Base\Repositories\Processes\Steps;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Processes\Steps\TaskStep;
use App\Base\Selectors\Processes\Steps\TaskStepSelector;

class TaskStepRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return TaskStep::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return TaskStepSelector::class;
    }
    
}
