<?php
namespace App\Base\Repositories\Tasks;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Tasks\QuestionTask;
use App\Base\Selectors\Tasks\QuestionTaskSelector;

class QuestionTaskRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return QuestionTask::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return QuestionTaskSelector::class;
    }
    
}
