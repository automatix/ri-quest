<?php
namespace App\Base\Repositories\ContentBlocks;

use App\Base\Entity\ContentBlocks\VideoContentBlock;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\ContentBlocks\VideoContentBlockSelector;

class VideoContentBlockRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return VideoContentBlock::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return VideoContentBlockSelector::class;
    }
    
}
