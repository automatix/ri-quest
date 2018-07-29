<?php
namespace App\Base\Entity\Processes;

use App\Base\Entity\AbstractProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * PoiProcess
 *
 * @ORM\Table(name="poi_concrete_processes")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\PoiProcessRepository")
 */
class PoiProcess extends AbstractProcess
{

}
