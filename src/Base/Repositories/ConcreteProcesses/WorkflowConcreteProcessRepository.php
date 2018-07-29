<?php
namespace App\Base\Repositories\ConcreteProcesses;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\ConcreteProcesses\WorkflowConcreteProcess;
use App\Base\Selectors\ConcreteProcesses\WorkflowConcreteProcessSelector;

class WorkflowConcreteProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return WorkflowConcreteProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return WorkflowConcreteProcessSelector::class;
    }
    
}
