<?php
namespace App\Base\Entity\ConcreteProcesses;

use App\Base\Entity\AbstractConcreteProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * PoiConcreteProcess
 *
 * @ORM\Table(name="poi_concrete_processes")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\ConcreteProcesses\PoiConcreteProcessRepository")
 */
class PoiConcreteProcess extends AbstractConcreteProcess
{

}
