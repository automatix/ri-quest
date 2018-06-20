<?php
namespace App\Base\Entity;

use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Step
 *
 * @ORM\Table(name="steps")
 * @ORM\Entity
 */
class Step extends Process
{

    /**
     * @var string
     *
     * @ORM\Column(name="step_type", type="string", length=0, nullable=false)
     */
    private $stepType;

    public function getStepType(): ?StepType
    {
        return new StepType($this->stepType);
    }

    public function setStepType(StepType $stepType): self
    {
        $this->stepType = $stepType->getValue();
        return $this;
    }

}
