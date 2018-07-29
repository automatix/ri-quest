<?php
namespace App\Base\Entity\Processes;

use App\Base\Entity\AbstractProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * Poi
 *
 * @ORM\Table(name="completions")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\CompletionRepository")
 */
class Completion extends AbstractProcess
{
}
