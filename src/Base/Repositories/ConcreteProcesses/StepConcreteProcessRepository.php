<?php
namespace App\Base\Repositories\ConcreteProcesses;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\ConcreteProcesses\StepConcreteProcess;
use App\Base\Selectors\ConcreteProcesses\StepConcreteProcessSelector;

class StepConcreteProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return StepConcreteProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return StepConcreteProcessSelector::class;
    }
    
}
