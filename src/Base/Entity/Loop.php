<?php
namespace App\Base\Entity;

use App\Base\Enums\Entities\LoopType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="loops", indexes={@ORM\Index(name="fk_loop_concrete_process_idx", columns={"concrete_process_id"})})
 * @ORM\Entity
 */
class Loop extends AbstractEntity
{

    /**
     * @var string|null
     *
     * @ORM\Column(name="`type`", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="`count`", type="integer", nullable=false)
     */
    private $count;

    /**
     * @var AbstractConcreteProcess
     *
     * @ORM\ManyToOne(targetEntity="AbstractConcreteProcess", inversedBy="loops")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="concrete_process_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $concreteProcess;

    public function getType(): ?string
    {
        return new LoopType($this->type);
    }

    public function setType(?LoopType $type): self
    {
        $this->type = $type->getValue();
        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): self
    {
        $this->count = $count;
        return $this;
    }

    public function getConcreteProcess(): ?AbstractConcreteProcess
    {
        return $this->concreteProcess;
    }

    public function setConcreteProcess(?AbstractConcreteProcess $concreteProcess): self
    {
        $this->concreteProcess = $concreteProcess;
        return $this;
    }

}
