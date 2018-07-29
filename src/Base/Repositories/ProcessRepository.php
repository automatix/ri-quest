<?php
namespace App\Base\Repositories;

use App\Base\Entity\AbstractProcess;
use App\Base\Selectors\AbstractProcessSelector;

class ProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return AbstractProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AbstractProcessSelector::class;
    }
    
}
