<?php
namespace App\Base\Repositories\Tasks;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Tasks\FunTask;
use App\Base\Selectors\Tasks\FunTaskSelector;

class FunTaskRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return FunTask::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return FunTaskSelector::class;
    }
    
}
