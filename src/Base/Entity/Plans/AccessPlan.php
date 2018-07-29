<?php
namespace App\Base\Entity\Plans;

use App\Base\Entity\AbstractPlan;
use Doctrine\ORM\Mapping as ORM;

/**
 * Poi
 *
 * @ORM\Table(name="accesses")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\AccessRepository")
 */
class AccessPlan extends AbstractPlan
{
}
