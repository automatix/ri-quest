<?php
namespace App\Base\Repository;

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
