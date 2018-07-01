<?php
namespace App\Base\Entity;

use App\Base\Enums\Entities\ProcessType;
use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractConcreteProcess
 *
 * @ORM\Table(name="concrete_processes", indexes={@ORM\Index(name="fk_concrete_process_concrete_process_idx", columns={"parent_id"})})
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="`type`", type="string")
 * @ORM\DiscriminatorMap({
 *     "scenario" = "App\Base\Entity\ConcreteProcesses\ScenarioConcreteProcess",
 *     "poi" = "App\Base\Entity\ConcreteProcesses\PoiConcreteProcess",
 *     "step" = "App\Base\Entity\ConcreteProcesses\StepConcreteProcess",
 *     "access" = "App\Base\Entity\ConcreteProcesses\AccessConcreteProcess",
 *     "completion" = "App\Base\Entity\ConcreteProcesses\CompletionConcreteProcess",
 * })
 */
abstract class AbstractConcreteProcess extends AbstractEntity
{

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=false, options={"default"="unknown"})
     */
    private $state = 'unknown';

    /**
     * @var AbstractConcreteProcess
     *
     * @ORM\ManyToOne(targetEntity="AbstractConcreteProcess")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;
        return $this;
    }
}
