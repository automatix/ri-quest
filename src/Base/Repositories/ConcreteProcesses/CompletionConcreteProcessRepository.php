<?php
namespace App\Base\Repositories\ConcreteProcesses;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\ConcreteProcesses\CompletionConcreteProcess;
use App\Base\Selectors\ConcreteProcesses\CompletionConcreteProcessSelector;

class CompletionConcreteProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return CompletionConcreteProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return CompletionConcreteProcessSelector::class;
    }
    
}
