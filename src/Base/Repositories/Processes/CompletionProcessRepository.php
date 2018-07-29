<?php
namespace App\Base\Repositories\Processes;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Processes\CompletionProcess;
use App\Base\Selectors\Processes\CompletionProcessSelector;

class CompletionProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return CompletionProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return CompletionProcessSelector::class;
    }
    
}
