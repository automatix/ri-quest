<?php
namespace App\Base\Entity\Processes;

use App\Base\Entity\AbstractProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * Poi
 *
 * @ORM\Table(name="pois")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\PoiRepository")
 */
class Poi extends AbstractProcess
{
}
