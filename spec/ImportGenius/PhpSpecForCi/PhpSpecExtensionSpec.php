<?php

namespace spec\ImportGenius\PhpSpecForCi;

use Closure;
use ImportGenius\PhpSpecForCi\ClassNotFoundListener;
use ImportGenius\PhpSpecForCi\DescribeCommandDecorator;
use ImportGenius\PhpSpecForCi\ExtendedDescribeCommand;
use ImportGenius\PhpSpecForCi\PhpSpecExtension;
use ImportGenius\PhpSpecForCi\ResourceManager;
use PhpSpec\CodeGenerator\GeneratorManager;
use PhpSpec\Console\Command\DescribeCommand;
use PhpSpec\Console\IO;
use PhpSpec\Extension\ExtensionInterface;
use PhpSpec\Locator\ResourceLocatorInterface;
use PhpSpec\Locator\ResourceManagerInterface;
use PhpSpec\Locator\ResourceManager as BaseResourceManager;
use PhpSpec\ObjectBehavior;
use PhpSpec\ServiceContainer;
use Prophecy\Argument;

/**
 * @mixin PhpSpecExtension
 */
class PhpSpecExtensionSpec extends ObjectBehavior
{
    private function getListOfCiClasses()
    {
        return [
            'CI_Benchmark',
            'CI_Calendar',
            'CI_Cart',
            'CI_Config',
            'CI_Controller',
            'CI_DB_active_record',
            'CI_DB_cache',
            'CI_DB_driver',
            'CI_DB_forge',
            'CI_DB_result',
            'CI_DB_utility',
            'CI_Email',
            'CI_Encrypt',
            'CI_Exceptions',
            'CI_Form_validation',
            'CI_FTP',
            'CI_Hooks',
            'CI_Image_lib',
            'CI_Input',
            'CI_Javascript',
            'CI_Lang',
            'CI_Loader',
            'CI_Log',
            'CI_Migration',
            'CI_Model',
            'CI_Output',
            'CI_Pagination',
            'CI_Parser',
            'CI_Profiler',
            'CI_Router',
            'CI_Security',
            'CI_Session',
            'CI_SHA1',
            'CI_Table',
            'CI_Trackback',
            'CI_Typography',
            'CI_Unit_test',
            'CI_Upload',
            'CI_URI',
            'CI_User_agent',
            'CI_Utf8',
            'CI_Xmlrpc',
            'CI_Xmlrpcs',
            'CI_Zip'
        ];
    }
    
    /**
     * @var ServiceContainer
     */
    private $container;

    function let()
    {
        $this->container = new ServiceContainer();
        $this->container->set('console.commands.describe', new DescribeCommand());
        $this->container->set('locator.resource_manager', new ResourceManager());

    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ImportGenius\PhpSpecForCi\PhpSpecExtension');
        $this->shouldHaveType(ExtensionInterface::class);
    }

    function it_should_load_codeigniter_doubles(ServiceContainer $container)
    {
        assert(defined('BASEPATH') === false, 'BASEPATH is not defined');
        $this->assertThatCiDoublesAreNotYetLoaded();
        $this->load($this->container);
        assert(defined('BASEPATH') === true, 'BASEPATH is defined');
        $this->assertThatCiDoublesWereLoaded();
    }

    function it_should_register_describe_command()
    {
        $container = new ServiceContainer();
        $container->set('console.commands.describe', new DescribeCommand());

        $this->setContainer($container);
        $this->registerDescribeCommand()->shouldReturn($this);

        expect($container->get('console.commands.describe'))->toBeAnInstanceOf(DescribeCommandDecorator::class);
    }

    function it_should_register_class_not_found_listener(
        IO $consoleIo,
        ResourceManagerInterface $resourceManager,
        GeneratorManager $generatorManager
    ) {
        $this->setContainer($container = new ServiceContainer())->shouldReturn($this);
        $container->set('console.io', $consoleIo->getWrappedObject());
        $container->set('locator.resource_manager', $resourceManager->getWrappedObject());
        $container->set('code_generator', $generatorManager->getWrappedObject());

        $this->registerClassNotFoundListener()->shouldReturn($this);
        expect($container->get('event_dispatcher.listeners.class_not_found'))
            ->toBeAnInstanceOf(ClassNotFoundListener::class)
        ;
    }

    function it_should_register_the_custom_resource_manager_as_a_closure(
        ServiceContainer $container,
        ResourceManagerInterface $stockResourceManager,
        ResourceLocatorInterface $locator
    )
    {
        $container->get('locator.resource_manager')->shouldBeCalledTimes(1);
        $container
            ->setShared('locator.resource_manager', Argument::type(Closure::class))
            ->shouldBeCalledTimes(1)
        ;
        $this->setContainer($container);
        $this->registerResourceManager();
    }

    function it_should_register_the_custom_resource_manager(
        BaseResourceManager $stockResourceManager,
        ResourceLocatorInterface $locator
    )
    {
        $container = new ServiceContainer();
        $container->set('locator.resource_manager', $stockResourceManager->getWrappedObject());
        $container->set('locator.locators.kevin_suite', $locator->getWrappedObject());
        $container->set('locator.locators.liza_suite', $locator->getWrappedObject());
        $this->setContainer($container);

        $this->registerResourceManager();
        $container->configure();

        $resourceManager = $container->get('locator.resource_manager');
        expect($resourceManager)->toBeAnInstanceOf(ResourceManager::class);
        expect($resourceManager->getLocators())->toHaveCount(2);
        expect($resourceManager->getStockResourceManager())->toBe($stockResourceManager);
    }

    private function assertThatCiDoublesAreNotYetLoaded()
    {
        foreach ($this->getListOfCiClasses() as $ciClass) {
            assert(class_exists($ciClass) === false, "{$ciClass} double is not loaded");
        }
    }

    private function assertThatCiDoublesWereLoaded()
    {
        foreach ($this->getListOfCiClasses() as $ciClass) {
            assert(class_exists($ciClass) === true, "{$ciClass} double was loaded");
        }
    }
}
