<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoStep
 *
 * @ORM\Table(name="info_steps")
 * @ORM\Entity
 */
class InfoStep extends Process
{
    /**
     * @var string
     *
     * @ORM\Column(name="step_type", type="string", length=0, nullable=false)
     */
    private $stepType;

    public function getStepType(): ?string
    {
        return $this->stepType;
    }

    public function setStepType(string $stepType): self
    {
        $this->stepType = $stepType;

        return $this;
    }


}
