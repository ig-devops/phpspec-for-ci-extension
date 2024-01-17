<?php

namespace ImportGenius\PhpSpecForCi;

use Exception;
use PhpSpec\Console\Command\DescribeCommand;
use PhpSpec\ServiceContainer;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DescribeCommandDecorator extends Command
{
    private static $instantiationIsAllowed = false;

    /**
     * @var DescribeCommand
     */
    private $describeCommand;

    /**
     * @inheritDoc
     */
    public function __construct($name = null)
    {
        if (self::instantiationIsNotAllowed()) {
            throw new UnInstantiatableException;
        }

        self::disallowInstantiation();

        parent::__construct($name);
    }

    /**
     * @param DescribeCommand $command
     *
     * @return DescribeCommandDecorator
     */
    public static function decorate(DescribeCommand $command)
    {
        self::allowInstantiation();
        $instance = new self($command->getName());
        $instance->setDescribeCommand($command);
        return $instance;
    }

    private static function instantiationIsNotAllowed()
    {
        return self::$instantiationIsAllowed !== true;
    }

    private static function disallowInstantiation()
    {
        self::$instantiationIsAllowed = false;
    }

    private static function allowInstantiation()
    {
        self::$instantiationIsAllowed = true;
    }

    /**
     * @param DescribeCommand $command
     *
     * @return DescribeCommandDecorator
     *
     * @SuppressWarnings(PHPMD.UnusedPrivateMethod)
     */
    private function setDescribeCommand(DescribeCommand $command)
    {
        $this->describeCommand = $command;
        $this->appendInputArgumentsFromWrappedObject($command);
        $this->copyInputOptionsFromWrappedObject($command);

        return $this;
    }

    /**
     * @return DescribeCommand
     */
    public function getDescribeCommand()
    {
        return $this->describeCommand;
    }

    protected function configure()
    {
        $this->addOption('suite', 's', InputOption::VALUE_OPTIONAL, 'The suite option to use');
        $this->setDescription('Creates a specification of a class relative to a given suite');
        $this->setHelp(<<<EOF
The <info>%command.name%</info> command creates a specification for a class:

  <info>php %command.full_name% ClassName --suite=<suite_name></info>

Will generate a specification ClassNameSpec in the <info>spec_path</info>
as specified in the suite configuration.

  <info>php %command.full_name% Namespace/ClassName --suite=<suite_name></info>

Will generate a namespaced specification Namespace\ClassNameSpec in the <info>spec_path</info>
as specified in the suite configuration.

Note that / is used as the separator. To use \ it must be quoted:

  <info>php %command.full_name% "Namespace\ClassName" --suite=<suite_name></info>

EOF
        );
    }

    /**
     * @param DescribeCommand $command
     */
    private function appendInputArgumentsFromWrappedObject(DescribeCommand $command)
    {
        foreach ($command->getDefinition()->getArguments() as $inputArgument) {
            $this->getDefinition()->addArgument($inputArgument);
        }
    }

    /**
     * @param DescribeCommand $command
     */
    private function copyInputOptionsFromWrappedObject(DescribeCommand $command)
    {
        foreach ($command->getDefinition()->getOptions() as $inputOption) {
            $this->getDefinition()->addOption($inputOption);
        }
    }

    /**
     * @inheritDoc
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        if ($suiteOption = $input->getOption('suite')) {
            /** @var ServiceContainer $container */
            $container = $this->getApplication()->getContainer();
            $container->configure();
            $className = $input->getArgument('class');
            $locator = $container->get(sprintf('locator.locators.%s_suite', $suiteOption));
            $container->get('code_generator')->generate($locator->createResource($className), 'specification');

            return;
        }

        $this->getDescribeCommand()->execute($input, $output);
    }

    /**
     * {@inheritDoc}
     */
    public function setApplication(Application $application = null)
    {
        parent::setApplication($application);
        $this->getDescribeCommand()->setApplication($application);
    }
}

// @codingStandardsIgnoreStart
class UnInstantiatableException extends Exception {}
// @codingStandardsIgnoreEnd