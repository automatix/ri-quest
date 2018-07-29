<?php
namespace App\Base\Entity\ConcreteProcesses;

use App\Base\Entity\AbstractConcreteProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * AccessConcreteProcess
 *
 * @ORM\Table(name="access_concrete_processes")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\ConcreteProcesses\AccessConcreteProcessRepository")
 */
class AccessConcreteProcess extends AbstractConcreteProcess
{

}
