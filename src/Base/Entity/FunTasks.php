<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FunTasks
 *
 * @ORM\Table(name="fun_tasks")
 * @ORM\Entity
 */
class FunTasks
{
    /**
     * @var \Tasks
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Tasks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}
