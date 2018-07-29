<?php
namespace App\Base\Entity\ConcreteProcesses;

use App\Base\Entity\AbstractConcreteProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * CompletionConcreteProcess
 *
 * @ORM\Table(name="completion_concrete_processes")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\ConcreteProcesses\CompletionConcreteProcessRepository")
 */
class CompletionConcreteProcess extends AbstractConcreteProcess
{

}
