<?php
namespace App\Base\Repositories;

use App\Base\Entity\AbstractContentBlock;
use App\Base\Selectors\AbstractContentBlockSelector;

class ContentBlockRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return AbstractContentBlock::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AbstractContentBlockSelector::class;
    }
    
}
