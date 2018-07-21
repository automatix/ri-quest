<?php
namespace App\Interop\Cli;

use App\Kernel;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateSelectorsCommand extends ContainerAwareCommand
{

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            // a good practice is to use the 'app:' prefix to group all your custom application commands
            ->setName('app:generate-selectors')
            ->setDescription('Generates ID Selectors for all entities.')
            ->setHelp('')
            // see http://symfony.com/doc/current/components/console/console_arguments.html
            ->addOption('entities_directory', 's', InputOption::VALUE_REQUIRED, 'The relative path to the source (root directory for entities).')
            ->addOption('selectors_directory', 't', InputOption::VALUE_REQUIRED, 'The relative path to the target (root directory for selectors).')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $projectRoot = $this->getContainer()->get('kernel')->getRootDir();
        echo implode(',', [$input->getOption('entities_directory'), $input->getOption('selectors_directory')]) . PHP_EOL;
        $output->writeln($projectRoot . '~~~' . PHP_EOL);
    }

}
