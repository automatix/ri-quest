<?php
namespace App\Base\Repositories;

use App\Base\Entity\Attempt;
use App\Base\Selectors\AttemptSelector;

class AttemptRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return Attempt::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AttemptSelector::class;
    }
    
}
