<?php
namespace App\Base\Repositories\ContentBlocks;

use App\Base\Entity\ContentBlocks\TextContentBlock;
use App\Base\Repositories\AbstractRepository;
use App\Base\Selectors\ContentBlocks\TextContentBlockSelector;

class TextContentBlockRepository extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return TextContentBlock::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return TextContentBlockSelector::class;
    }
    
}
