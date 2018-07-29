<?php
namespace App\Base\Repositories\Processes;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Processes\Step;
use App\Base\Selectors\Processes\StepSelector;

class StepRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return Step::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return StepSelector::class;
    }
    
}
