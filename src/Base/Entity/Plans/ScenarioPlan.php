<?php
namespace App\Base\Entity\Plans;

use App\Base\Entity\AbstractPlan;
use Doctrine\ORM\Mapping as ORM;

/**
 * Scenario
 *
 * @ORM\Table(name="scenarios")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Plans\ScenarioPlanRepository")
 */
class ScenarioPlan extends AbstractPlan
{

}
