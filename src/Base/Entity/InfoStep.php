<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoStep
 *
 * @ORM\Table(name="info_steps")
 * @ORM\Entity
 */
class InfoStep
{
    /**
     * @var Step
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Step")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    public function getId(): ?Step
    {
        return $this->id;
    }

    public function setId(?Step $id): self
    {
        $this->id = $id;

        return $this;
    }


}
