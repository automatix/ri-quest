<?php
namespace App\Base\Repositories;

use App\Base\Entity\Answer;
use App\Base\Selectors\AnswerSelector;

class AnswerRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return Answer::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AnswerSelector::class;
    }
    
}
