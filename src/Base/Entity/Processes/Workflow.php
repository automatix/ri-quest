<?php
namespace App\Base\Entity\Processes;

use App\Base\Entity\AbstractProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * Workflow
 *
 * @ORM\Table(name="workflows")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\WorkflowRepository")
 */
class Workflow extends AbstractProcess
{

}
