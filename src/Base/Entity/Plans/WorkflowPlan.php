<?php
namespace App\Base\Entity\Plans;

use App\Base\Entity\AbstractPlan;
use Doctrine\ORM\Mapping as ORM;

/**
 * WorkflowPlan
 *
 * @ORM\Table(name="workflows")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\WorkflowRepository")
 */
class WorkflowPlan extends AbstractPlan
{

}
