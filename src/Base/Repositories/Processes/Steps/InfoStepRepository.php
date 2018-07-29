<?php
namespace App\Base\Repositories\Processes\Steps;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Processes\Steps\InfoStep;
use App\Base\Selectors\Processes\Steps\InfoStepSelector;

class InfoStepRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return InfoStep::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return InfoStepSelector::class;
    }
    
}
