<?php
namespace App\Base\Repositories\Processes;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Processes\WorkflowProcess;
use App\Base\Selectors\Processes\WorkflowProcessSelector;

class WorkflowProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return WorkflowProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return WorkflowProcessSelector::class;
    }
    
}
