<?php
namespace App\Base\Entity\ConcreteProcesses;

use App\Base\Entity\AbstractConcreteProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * StepConcreteProcess
 *
 * @ORM\Table(name="step_concrete_processes")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\ConcreteProcesses\StepConcreteProcessRepository")
 */
class StepConcreteProcess extends AbstractConcreteProcess
{

}
