<?php
namespace App\Base\Repositories\Processes\Steps;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Processes\Steps\PlaceStep;
use App\Base\Selectors\Processes\Steps\PlaceStepSelector;

class PlaceStepRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return PlaceStep::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return PlaceStepSelector::class;
    }
    
}
