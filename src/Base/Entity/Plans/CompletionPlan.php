<?php
namespace App\Base\Entity\Plans;

use App\Base\Entity\AbstractPlan;
use Doctrine\ORM\Mapping as ORM;

/**
 * Poi
 *
 * @ORM\Table(name="completions")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Plans\CompletionPlanRepository")
 */
class CompletionPlan extends AbstractPlan
{
}
