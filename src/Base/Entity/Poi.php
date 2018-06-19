<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poi
 *
 * @ORM\Table(name="pois")
 * @ORM\Entity
 */
class Poi extends AbstractEntity
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
