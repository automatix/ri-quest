<?php
namespace App\Base\Entity\MessageStacks;

use App\Base\Entity\MessageStack;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SemanticalMessageStack
 *
 * @ORM\Table(name="semantical_message_stacks")
 * @ORM\Entity
 */
class SemanticalMessageStack extends MessageStack
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="semantic", type="string", length=255, nullable=false)
     */
    private $semantic;

    public function getSemantic(): ?string
    {
        return $this->semantic;
    }

    public function setSemantic(?string $semantic): self
    {
        $this->semantic = $semantic;
        return $this;
    }

}
