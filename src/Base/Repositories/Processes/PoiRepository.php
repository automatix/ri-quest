<?php
namespace App\Base\Repositories\Processes;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\Processes\Poi;
use App\Base\Selectors\Processes\PoiSelector;

class PoiRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return Poi::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return PoiSelector::class;
    }
    
}
