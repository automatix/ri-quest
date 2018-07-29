<?php
namespace App\Interop\Cli;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * The GenerateSelectorsCommand generates ID Selectors for every Entity class
 * excepting the AbstractEntity.
 * So every Foo Entity class gets a FooSelector class,
 * every AbstractFoo class gets a FooSelector class.
 *
 * Usege example:
 * $ cd /path/to/project
 * $ bin/console app:generate-selectors -s './Base/Entity' -t './Base/Selectors'
 *
 * @package App\Interop\Cli
 * @author Ilya Khanataev <contact@mevatex.com>
 * @todo Refactor it and write tests!
 * @todo Write a help!
 */
class GenerateRepositoriesCommand extends ContainerAwareCommand
{

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            // a good practice is to use the 'app:' prefix to group all your custom application commands
            ->setName('app:generate-repositories')
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
        $entitiesDir = $projectRoot . preg_replace('/^\.\//', '/', $input->getOption('entities_directory'));
        $selectorsDir = $projectRoot . preg_replace('/^\.\//', '/', $input->getOption('selectors_directory'));

        /** @var RecursiveIteratorIterator $iterator */
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($entitiesDir));
        /** @var SplFileInfo $element */
        foreach ($iterator as $element) {
            $currentFileName = $iterator->getFilename();
            if ($element->isFile() && $currentFileName !== 'AbstractEntity') {
                $subPath = $iterator->getSubPath();
                $targetPath = $selectorsDir . DIRECTORY_SEPARATOR . $subPath;
                if (! is_dir($targetPath)) {
                    mkdir($targetPath, '0777', true);
                }

                $selectorPathName = $this->normalizePath($targetPath . DIRECTORY_SEPARATOR . $this->getSelectorFileName($currentFileName));
                copy($element->getPathname(), $selectorPathName);
                file_put_contents($selectorPathName, $this->getSelectorClassContent($currentFileName, $subPath));
            }
        }
        $output->writeln('');
    }

    private function getSelectorClassContent(string $entityFileName, string $subPath)
    {
        $selectorSubNamespace = $this->getSelectorSubNamespace($subPath);
        $selectorUseStatament = '';
        if (! empty($subPath)) {
            $selectorSubNamespace = '\\' . $selectorSubNamespace;
            $selectorUseStatament = PHP_EOL . 'use App\\Base\\Repositories\\AbstractRepository;';

        }
        $repoClassName = $this->getSelectorClassName($entityFileName);
        $entityClassName = str_replace('.php', '', $entityFileName);
        $entityUse = 'use App\\Base\\Entity' . $selectorSubNamespace . '\\' . $entityClassName . ';';
        $selectorClassName = str_replace('.php', '', $entityFileName) . 'Selector';
        $selectorUse = 'use App\\Base\\Selectors' . $selectorSubNamespace . '\\' . $selectorClassName . ';';
        return <<<CONTENT
<?php
namespace App\Base\Repositories{$selectorSubNamespace};
{$selectorUseStatament}
{$entityUse}
{$selectorUse}

class {$repoClassName} extends AbstractRepository
{

    /**
     * @inheritdoc
     */
    public function getEntityClass()
    {
        return {$entityClassName}::class;
    }

    /**
     * @inheritdoc
     */
    public function getEntitySelectorClass()
    {
        return {$selectorClassName}::class;
    }
    
}

CONTENT;

    }

    private function getSelectorFileName(string $entityFileName)
    {
        return $this->getSelectorClassName($entityFileName) . '.php';
    }

    private function getSelectorClassName(string $entityFileName)
    {
        return preg_replace(['/^Abstract/', '/.php$/'], '', $entityFileName) . 'Repository';
    }

    private function getSelectorSubNamespace(string $subPath)
    {
        return preg_replace('/([\/]+)|([\\\\]+)/', '\\', $subPath);
    }

    private function normalizePath(string $path)
    {
        return preg_replace('/([\/]+)|([\\\\]+)/', DIRECTORY_SEPARATOR, $path);
    }

}
