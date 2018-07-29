<?php
namespace App\Base\Entity\Plans;

use App\Base\Entity\AbstractPlan;
use Doctrine\ORM\Mapping as ORM;

/**
 * Poi
 *
 * @ORM\Table(name="pois")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\PoiRepository")
 */
class PoiPlan extends AbstractPlan
{
}
