<?php
namespace App\Base\Repositories\Processes;

use App\Base\Entity\Processes\AccessProcess;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\Processes\AccessProcessSelector;

class AccessProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return AccessProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AccessProcessSelector::class;
    }
    
}
