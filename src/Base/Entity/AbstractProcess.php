<?php
namespace App\Base\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractProcess
 *
 * @ORM\Table(name="concrete_processes",
 *     indexes={
 *         @ORM\Index(name="fk_concrete_process_concrete_process_idx", columns={"parent_id"})
 *     }
 * )
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *     "access" = "App\Base\Entity\Processes\AccessProcess",
 *     "completion" = "App\Base\Entity\Processes\CompletionProcess",
 *     "poi" = "App\Base\Entity\Processes\PoiProcess",
 *     "scenario" = "App\Base\Entity\Processes\ScenarioProcess",
 *     "step" = "App\Base\Entity\Processes\StepProcess",
 *     "workflow" = "App\Base\Entity\Processes\WorkflowProcess",
 * })
 */
abstract class AbstractProcess extends AbstractEntity
{

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=false, options={"default"="unknown"})
     */
    private $state = 'unknown';

    /**
     * @var AbstractProcess
     *
     * @ORM\ManyToOne(targetEntity="AbstractProcess")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Loop", mappedBy="process")
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
