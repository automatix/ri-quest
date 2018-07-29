<?php
namespace App\Base\Repositories\Plans;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Plans\CompletionPlan;
use App\Base\Selectors\Processes\CompletionSelector;

class CompletionPlanRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return CompletionPlan::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return CompletionSelector::class;
    }
    
}
