<?php
namespace App\Base\Entity\ContentBlocks;

use App\Base\Entity\ContentBlock;
use Doctrine\ORM\Mapping as ORM;

/**
 * ImageContentBlock
 *
 * @ORM\Table(name="image_content_blocks")
 * @ORM\Entity
 */
class ImageContentBlock extends ContentBlock
{
    /**
     * @var string
     *
     * @ORM\Column(name="src", type="string", length=1000, nullable=false)
     */
    private $src;

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(string $src): self
    {
        $this->src = $src;
        return $this;
    }
}
