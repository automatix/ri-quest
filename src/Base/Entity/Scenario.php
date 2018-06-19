<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scenario
 *
 * @ORM\Table(name="scenarios")
 * @ORM\Entity
 */
class Scenario
{
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
