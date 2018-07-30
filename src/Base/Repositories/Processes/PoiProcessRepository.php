<?php
namespace App\Base\Repositories\Processes;

use App\Base\Entity\Processes\PoiProcess;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\Processes\PoiProcessSelector;

class PoiProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return PoiProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return PoiProcessSelector::class;
    }
    
}
