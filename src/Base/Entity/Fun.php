<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fun
 *
 * @ORM\Table(name="funs")
 * @ORM\Entity
 */
class Fun
{
    /**
     * @var Task
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Task")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    public function getId(): ?Task
    {
        return $this->id;
    }

    public function setId(?Task $id): self
    {
        $this->id = $id;

        return $this;
    }


}
