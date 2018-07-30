<?php
namespace App\Base\Entity\Processes;

use App\Base\Entity\AbstractProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * StepProcess
 *
 * @ORM\Table(name="step_processes")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\StepProcessRepository")
 */
class StepProcess extends AbstractProcess
{

}
