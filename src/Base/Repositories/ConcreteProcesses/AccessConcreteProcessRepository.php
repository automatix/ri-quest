<?php
namespace App\Base\Repositories\ConcreteProcesses;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\ConcreteProcesses\AccessConcreteProcess;
use App\Base\Selectors\ConcreteProcesses\AccessConcreteProcessSelector;

class AccessConcreteProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return AccessConcreteProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AccessConcreteProcessSelector::class;
    }
    
}
