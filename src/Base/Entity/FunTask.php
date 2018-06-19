<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FunTask
 *
 * @ORM\Table(name="fun_tasks")
 * @ORM\Entity
 */
class FunTask
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
