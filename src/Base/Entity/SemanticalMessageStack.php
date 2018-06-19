<?php

namespace App\Base\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SemanticalMessageStack
 *
 * @ORM\Table(name="semantical_message_stacks")
 * @ORM\Entity
 */
class SemanticalMessageStack
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="semantic", type="string", length=0, nullable=true)
     */
    private $semantic;

    /**
     * @var MessageStack
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="MessageStack")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    public function getSemantic(): ?string
    {
        return $this->semantic;
    }

    public function setSemantic(?string $semantic): self
    {
        $this->semantic = $semantic;

        return $this;
    }

    public function getId(): ?MessageStack
    {
        return $this->id;
    }

    public function setId(?MessageStack $id): self
    {
        $this->id = $id;

        return $this;
    }

}
