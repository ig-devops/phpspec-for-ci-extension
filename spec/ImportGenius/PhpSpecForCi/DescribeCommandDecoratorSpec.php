<?php

namespace spec\ImportGenius\PhpSpecForCi;

use ImportGenius\PhpSpecForCi\DescribeCommandDecorator;
use PhpSpec\CodeGenerator\GeneratorManager;
use PhpSpec\Console\Application;
use PhpSpec\Console\Command\DescribeCommand;
use PhpSpec\Locator\PSR0\PSR0Locator;
use PhpSpec\Locator\PSR0\PSR0Resource;
use PhpSpec\Locator\ResourceManager;
use PhpSpec\ObjectBehavior;
use PhpSpec\ServiceContainer;
use Prophecy\Argument;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\EventDispatcher\Tests\Service;

/**
 * @mixin DescribeCommandDecorator
 */
class DescribeCommandDecoratorSpec extends ObjectBehavior
{
    /**
     * @var DescribeCommand
     */
    private $command;

    /**
     * @var InputDefinition
     */
    private $inputDefinition;

    function let(
        DescribeCommand $command,
        InputDefinition $inputDefinition
    )
    {
        $this->command = $command;
        $this->command->getDefinition()->willReturn($this->inputDefinition = $inputDefinition);
        $this->command->getName()->shouldBeCalledTimes(1)->willReturn('foo');

        $this->inputDefinition->getArguments()->shouldBeCalled()->willReturn([]);
        $this->inputDefinition->getOptions()->shouldBeCalled()->willReturn([]);

        $this->beConstructedThrough('decorate', [$command]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ImportGenius\PhpSpecForCi\DescribeCommandDecorator');
        $this->shouldHaveType(Command::class);
    }

    function it_should_not_be_directly_initializable()
    {
        $this->command->getName()->shouldNotBeCalled();
        $this->command->getDefinition()->shouldNotBeCalled();
        $this->inputDefinition->getArguments()->shouldNotBeCalled();
        $this->inputDefinition->getOptions()->shouldNotBeCalled();
        $this->shouldThrow('ImportGenius\PhpSpecForCi\UnInstantiatableException')->during('__construct', ['foo']);
    }

    function it_should_return_the_wrapped_command()
    {
        $this->getDescribeCommand()->shouldReturn($this->command);
    }

    function it_should_set_the_application_into_the_wrapped_command(Application $app, HelperSet $helperSet)
    {
        $app->getHelperSet()->willReturn($helperSet);
        $this->command->setApplication($app)->shouldBeCalledTimes(1);
        $this->setApplication($app);
    }

    function it_should_have_suite_option()
    {
        $suiteOption = $this->getDefinition()->getOption('suite');
        $suiteOption->getName()->shouldBe('suite');
        $suiteOption->getShortcut()->shouldBe('s');
        $suiteOption->isValueOptional()->shouldBe(true);
        $suiteOption->getDescription()->shouldBe('The suite option to use');
    }

    function it_should_accept_input_arguments_from_wrapped_object(InputArgument $argument)
    {
        $this->inputDefinition->getArguments()->shouldBeCalledTimes(1)->willReturn([$argument]);
        $this->getDefinition()->getArguments()->shouldHaveCount(1);
    }

    function it_should_accept_input_options_from_wrapped_object(InputOption $option)
    {
        $this->inputDefinition->getOptions()->shouldBeCalledTimes(1)->willReturn([$option]);
        $this->getDefinition()->getOptions()->shouldHaveCount(2);
    }

    function it_should_return_the_name_of_the_wrapped_command()
    {
        $this->command->getName()->shouldBeCalledTimes(1)->willReturn($cmdName = 'RonnelCommand');
        $this->getName()->shouldBe($cmdName);
    }

    function it_should_provide_a_help_text()
    {
        $this->getHelp()->shouldReturn(<<<EOF
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

    function it_should_return_its_description()
    {
        $this->getDescription()->shouldReturn('Creates a specification of a class relative to a given suite');
    }

    function it_should_be_executable(
        Application $app,
        ServiceContainer $container,
        HelperSet $helperSet,
        Input $input,
        Output $output,
        PSR0Locator $locator,
        PSR0Resource $resource,
        GeneratorManager $generatorManager
    )
    {
        $this->command->setApplication($app)->shouldBeCalledTimes(1);
        $app->getContainer()->shouldBeCalled()->willReturn($container);
        $app->getHelperSet()->shouldBeCalled()->willReturn($helperSet);

        $container->configure()->shouldBeCalledTimes(1);
        $container->get('locator.locators.ci_vendor_suite')->shouldBeCalledTimes(1)->willReturn($locator);
        $container->get('code_generator')->shouldBeCalledTimes(1)->willReturn($generatorManager);

        $input->getArgument('class')->shouldBeCalledTimes(1)->willReturn($describedClass = 'Foo\Bar');
        $input->getOption('suite')->shouldBeCalledTimes(1)->willReturn($suiteName = 'ci_vendor');

        $locator->createResource($describedClass)->shouldBeCalledTimes(1)->willReturn($resource);
        $generatorManager->generate($resource, 'specification')->shouldBeCalledTimes(1);

        $this->setApplication($app);
        $this->execute($input, $output);
    }

    function it_should_delegate_command_execution_to_wrapped_command(
        Application $app,
        ServiceContainer $container,
        Input $input,
        Output $output,
        PSR0Resource $resource,
        GeneratorManager $generatorManager,
        ResourceManager $resourceManager
    )
    {
        $this->command->getApplication()->willReturn($app);
        $app->getContainer()->willReturn($container);

        $input->getArgument('class')->willReturn($className = 'Albert\Kevin');
        $input->getOption('suite')->willReturn(null);

        $container->configure()->shouldBeCalledTimes(1);
        $container->get('locator.resource_manager')->willReturn($resourceManager);
        $container->get('code_generator')->willReturn($generatorManager);

        $resourceManager->createResource($className)->willReturn($resource);
        $generatorManager->generate($resource, 'specification')->shouldBeCalledTimes(1);

        $this->execute($input, $output);
    }
}
