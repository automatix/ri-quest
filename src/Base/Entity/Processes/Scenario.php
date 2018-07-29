<?php
namespace App\Base\Entity\Processes;

use App\Base\Entity\AbstractProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * Scenario
 *
 * @ORM\Table(name="scenarios")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\ScenarioRepository")
 */
class Scenario extends AbstractProcess
{

}
