<?php
namespace App\Base\Repositories\ConcreteProcesses;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\ConcreteProcesses\PoiConcreteProcess;
use App\Base\Selectors\ConcreteProcesses\PoiConcreteProcessSelector;

class PoiConcreteProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return PoiConcreteProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return PoiConcreteProcessSelector::class;
    }
    
}
