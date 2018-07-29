<?php
namespace App\Base\Repositories\Processes;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Processes\Completion;
use App\Base\Selectors\Processes\CompletionSelector;

class CompletionRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return Completion::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return CompletionSelector::class;
    }
    
}
