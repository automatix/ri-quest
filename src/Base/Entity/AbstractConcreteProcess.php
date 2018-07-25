<?php
namespace App\Base\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractConcreteProcess
 *
 * @ORM\Table(name="concrete_processes", indexes={
 *     @ORM\Index(name="fk_concrete_process_concrete_process_idx", columns={"parent_id"})
 * })
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="`type`", type="string")
 * @ORM\DiscriminatorMap({
 *     "access" = "App\Base\Entity\ConcreteProcesses\AccessConcreteProcess",
 *     "completion" = "App\Base\Entity\ConcreteProcesses\CompletionConcreteProcess",
 *     "poi" = "App\Base\Entity\ConcreteProcesses\PoiConcreteProcess",
 *     "scenario" = "App\Base\Entity\ConcreteProcesses\ScenarioConcreteProcess",
 *     "step" = "App\Base\Entity\ConcreteProcesses\StepConcreteProcess",
 *     "workflow" = "App\Base\Entity\ConcreteProcesses\WorkflowConcreteProcess",
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

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Loop", mappedBy="concreteProcess")
     */
    private $loops;

    public function __construct()
    {
        parent::__construct();
        $this->loops = new ArrayCollection();
    }

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

    public function getLoops(): Collection
    {
        return $this->loops;
    }

    public function addLoop(Loop $loop): self
    {
        if (!$this->loops->contains($loop)) {
            $this->loops[] = $loop;
        }
        return $this;
    }

    public function removeLoop(Loop $loop): self
    {
        if ($this->loops->contains($loop)) {
            $this->loops->removeElement($loop);
        }
        return $this;
    }

}
