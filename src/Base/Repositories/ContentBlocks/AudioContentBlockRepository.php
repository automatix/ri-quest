<?php
namespace App\Base\Repositories\ContentBlocks;

use App\Base\Entity\ContentBlocks\AudioContentBlock;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\ContentBlocks\AudioContentBlockSelector;

class AudioContentBlockRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return AudioContentBlock::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return AudioContentBlockSelector::class;
    }
    
}
