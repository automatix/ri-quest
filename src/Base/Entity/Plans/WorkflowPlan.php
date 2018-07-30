<?php
namespace App\Base\Entity\Plans;

use App\Base\Entity\AbstractPlan;
use Doctrine\ORM\Mapping as ORM;

/**
 * WorkflowPlan
 *
 * @ORM\Table(name="workflow_plans")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Plans\WorkflowPlanRepository")
 */
class WorkflowPlan extends AbstractPlan
{

}
