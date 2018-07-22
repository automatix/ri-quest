<?php
namespace App\Base\Entity;

use DateTime;
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

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    protected $dateCreated;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    protected $dateModified;

    public function __construct()
    {
        $this->dateCreated = new DateTime();
        $this->dateModified = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;
    }

    public function getDateModified(): DateTime
    {
        return $this->dateModified;
    }

    public function setDateModified(): self
    {
        $this->dateModified = new DateTime();
        return $this;
    }

}

