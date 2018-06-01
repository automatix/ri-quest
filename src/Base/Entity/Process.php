<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Process
 *
 * @ORM\Table(name="processes", indexes={@ORM\Index(name="fk_process_process_idx", columns={"process_id"})})
 * @ORM\Entity
 */
class Process
{

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=0, nullable=false, options={"default"="unknown"})
     */
    private $state = 'unknown';

    /**
     * @var Process
     *
     * @ORM\ManyToOne(targetEntity="Process")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="process_id", referencedColumnName="id")
     * })
     */
    private $process;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
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

    public function getProcess(): ?self
    {
        return $this->process;
    }

    public function setProcess(?self $process): self
    {
        $this->process = $process;

        return $this;
    }


}
