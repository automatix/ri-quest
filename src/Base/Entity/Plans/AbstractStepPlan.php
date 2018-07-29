<?php
namespace App\Base\Entity\Plans;

use App\Base\Entity\AbstractPlan;
use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Step
 *
 * @ORM\Table(name="steps")
 * @ORM\Entity
 */
abstract class AbstractStepPlan extends AbstractPlan
{

    /**
     * @var string
     *
     * @ORM\Column(name="step_type", type="string", length=255, nullable=false)
     */
    private $stepType;

    public function getStepType(): ?StepType
    {
        return new StepType($this->stepType);
    }

    protected function setStepType(StepType $stepType): self
    {
        $this->stepType = $stepType->getValue();
        return $this;
    }

}
