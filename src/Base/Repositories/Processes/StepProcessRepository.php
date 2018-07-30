<?php
namespace App\Base\Repositories\Processes;

use App\Base\Entity\Processes\StepProcess;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\Processes\StepProcessSelector;

class StepProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return StepProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return StepProcessSelector::class;
    }
    
}
