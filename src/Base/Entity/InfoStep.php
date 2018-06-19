<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoStep
 *
 * @ORM\Table(name="info_steps")
 * @ORM\Entity
 */
class InfoStep extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="step_type", type="string", length=0, nullable=false)
     */
    private $stepType;

    /**
     * @var Process
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Process")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    public function getStepType(): ?string
    {
        return $this->stepType;
    }

    public function setStepType(string $stepType): self
    {
        $this->stepType = $stepType;

        return $this;
    }

    public function getId(): ?Process
    {
        return $this->id;
    }

    public function setId(?Process $id): self
    {
        $this->id = $id;

        return $this;
    }


}
