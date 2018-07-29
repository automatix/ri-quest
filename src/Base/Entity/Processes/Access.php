<?php
namespace App\Base\Entity\Processes;

use App\Base\Entity\AbstractProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * Poi
 *
 * @ORM\Table(name="accesses")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\AccessRepository")
 */
class Access extends AbstractProcess
{
}
