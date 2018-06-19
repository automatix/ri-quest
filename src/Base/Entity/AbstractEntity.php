<?php
namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class AbstractEntity
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }

}
