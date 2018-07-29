<?php
namespace App\Base\Repositories\Processes;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Processes\Workflow;
use App\Base\Selectors\Processes\WorkflowSelector;

class WorkflowRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return Workflow::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return WorkflowSelector::class;
    }
    
}
