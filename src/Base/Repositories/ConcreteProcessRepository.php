<?php
namespace App\Base\Repositories;

use App\Base\Entity\AbstractConcreteProcess;
use App\Base\Selectors\AbstractConcreteProcessSelector;

class ConcreteProcessRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return AbstractConcreteProcess::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AbstractConcreteProcessSelector::class;
    }
    
}
