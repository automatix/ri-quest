<?php
namespace App\Base\Repositories\Processes;

use App\Base\Entity\Processes\ScenarioProcess;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\Processes\ScenarioProcessSelector;

class ScenarioProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return ScenarioProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return ScenarioProcessSelector::class;
    }
    
}
