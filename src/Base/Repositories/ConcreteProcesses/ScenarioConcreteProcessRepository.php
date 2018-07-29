<?php
namespace App\Base\Repositories\ConcreteProcesses;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\ConcreteProcesses\ScenarioConcreteProcess;
use App\Base\Selectors\ConcreteProcesses\ScenarioConcreteProcessSelector;

class ScenarioConcreteProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return ScenarioConcreteProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return ScenarioConcreteProcessSelector::class;
    }
    
}
