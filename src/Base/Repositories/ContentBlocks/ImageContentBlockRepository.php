<?php
namespace App\Base\Repositories\ContentBlocks;

use App\Base\Entity\ContentBlocks\ImageContentBlock;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\ContentBlocks\ImageContentBlockSelector;

class ImageContentBlockRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return ImageContentBlock::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return ImageContentBlockSelector::class;
    }
    
}
