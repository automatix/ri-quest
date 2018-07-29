<?php
namespace App\Base\Repositories;

use App\Base\Entity\AbstractTask;
use App\Base\Selectors\AbstractTaskSelector;

class TaskRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return AbstractTask::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AbstractTaskSelector::class;
    }
    
}
