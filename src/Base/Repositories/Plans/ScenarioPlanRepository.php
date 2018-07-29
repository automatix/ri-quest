<?php
namespace App\Base\Repositories\Plans;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Plans\ScenarioPlan;
use App\Base\Selectors\Processes\ScenarioPlanSelector;

class ScenarioPlanRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return ScenarioPlan::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return ScenarioPlanSelector::class;
    }
    
}
