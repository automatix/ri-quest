<?php
namespace App\Base\Repositories\ContentBlocks;

use App\Base\Repositories\AbstractRepository;
use App\Base\Entity\ContentBlocks\LinkContentBlock;
use App\Base\Selectors\ContentBlocks\LinkContentBlockSelector;

class LinkContentBlockRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return LinkContentBlock::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return LinkContentBlockSelector::class;
    }
    
}
