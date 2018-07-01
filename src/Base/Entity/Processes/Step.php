<?php
namespace App\Base\Entity\Processes;

use App\Base\Entity\AbstractProcess;
use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Step
 *
 * @ORM\Table(name="steps")
 * @ORM\Entity
 */
abstract class Step extends AbstractProcess
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
