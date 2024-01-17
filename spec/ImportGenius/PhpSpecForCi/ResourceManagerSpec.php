<?php

namespace spec\ImportGenius\PhpSpecForCi;

use ImportGenius\PhpSpecForCi\AmbiguousSuiteScopeForClassException;
use ImportGenius\PhpSpecForCi\CannotFindSuiteScopeForClassException;
use ImportGenius\PhpSpecForCi\ResourceManager;
use ImportGenius\PhpSpecForCi\ResourceManagerAlreadySetException;
use ImportGenius\PhpSpecForCi\ResourceManagerNotSetException;
use PhpSpec\Locator\PSR0\PSR0Locator;
use PhpSpec\Locator\ResourceLocatorInterface;
use PhpSpec\Locator\ResourceManager as BaseResourceManager;
use PhpSpec\Locator\ResourceManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Config\Resource\ResourceInterface;

/**
 * @mixin ResourceManager
 */
class ResourceManagerSpec extends ObjectBehavior
{
    private $manager;

    function let(BaseResourceManager $manager)
    {
        $this->manager = $manager;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ImportGenius\PhpSpecForCi\ResourceManager');
        $this->shouldHaveType(BaseResourceManager::class);
    }

    function it_should_return_the_resource_manager_that_was_set(ResourceManagerInterface $resourceManager)
    {
        $this->setStockResourceManager($resourceManager)->shouldReturn($this);
        $this->getStockResourceManager()->shouldReturn($resourceManager);
    }

    function it_should_prevent_setting_a_different_resource_manager(ResourceManagerInterface $resourceManager)
    {
        $this->setStockResourceManager($resourceManager);
        $this
            ->shouldThrow(ResourceManagerAlreadySetException::class)
            ->during('setStockResourceManager', [$resourceManager])
        ;
    }

    function it_should_throw_exception_when_resource_manager_was_not_set()
    {
        $this->shouldThrow(ResourceManagerNotSetException::class)->during('getStockResourceManager');
    }

    function it_should_delegate_locating_of_resources_to_stock_resource_manager(ResourceManagerInterface $manager)
    {
        $query = 'foo';
        $manager->locateResources($query)->shouldBeCalledTimes(1)->willReturn($returnedArray = [mt_rand(0,100)]);
        $this->setStockResourceManager($manager);
        $this->locateResources($query)->shouldReturn($returnedArray);
    }

    function it_should_accept_a_resource_locator(ResourceLocatorInterface $locator)
    {
        $this->setStockResourceManager($this->manager);
        $this->manager->registerLocator($locator)->shouldBeCalledTimes(1);

        $this->registerLocator($locator)->shouldReturn($this);
    }

    function it_should_return_array_of_locators(ResourceLocatorInterface $locator)
    {
        $this->setStockResourceManager($this->manager);
        $this->registerLocator($locator);
        $this->registerLocator($locator);
        $this->getLocators()->shouldReturn([$locator, $locator]);
    }

    function it_creates_a_resource_for_a_class_that_matches_a_locator(
        PSR0Locator $locator,
        ResourceInterface $resource,
        BaseResourceManager $manager
    ) {
        $className = 'Foo\Bar\Wow\SampleClass';
        $this->setStockResourceManager($manager);
        $this->registerLocator($locator);
        $locator->getSrcNamespace()->shouldBeCalledTimes(1);
        $locator->createResource($className)->shouldBeCalledTimes(1)->willReturn($resource);

        $this->createResource($className)->shouldReturn($resource);
    }

    function it_creates_a_resource_for_a_class_that_matches_a_locator_with_depth_precedence_among_multiple_locators(
        PSR0Locator $locatorWithDeepPrecedence,
        PSR0Locator $otherLocator,
        ResourceInterface $resource,
        BaseResourceManager $manager
    ) {
        $className = 'Foo\Bar\Wow\SampleClass';
        $this->registerLocators([$otherLocator, $locatorWithDeepPrecedence]);
        $this->initializeLocatorsToReturnNamespace([$otherLocator], 'Foo\Bar');
        $this->initializeLocatorsToReturnNamespace([$locatorWithDeepPrecedence], 'Foo\Bar\Wow');
        $locatorWithDeepPrecedence->createResource($className)->shouldBeCalledTimes(1)->willReturn($resource);

        $this->createResource($className)->shouldReturn($resource);
    }

    function it_should_throw_AmbiguousException_when_multiple_locators_with_no_namespace_precedence_match_the_given_classname(
        PSR0Locator $locatorA,
        PSR0Locator $locatorB
    ) {
        $className = 'Foo\Bar\Wow\SampleClass';
        $this->registerLocators([$locatorA, $locatorB]);
        $this->initializeLocatorsToReturnNamespace([$locatorA, $locatorB], 'Foo\Bar\Wow');

        $this->shouldThrow(AmbiguousSuiteScopeForClassException::class)->during('createResource',[$className]);
    }

    function it_should_throw_CannotFindSuiteScopeForClassException_when_a_given_classname_does_not_match_any_locator(
        PSR0Locator $locatorA,
        PSR0Locator $locatorB
    ) {
        $className = 'Foo\Bar\Wow\SampleClass';
        $this->registerLocators([$locatorA, $locatorB]);
        $this->initializeLocatorsToReturnNamespace([$locatorA], 'Wow\Baz\Foo');
        $this->initializeLocatorsToReturnNamespace([$locatorB], 'Baz\Wow');

        $this->shouldThrow(CannotFindSuiteScopeForClassException::class)->during('createResource',[$className]);
    }

    /**
     * @param PSR0Locator[] $locators
     * @param string        $locatorNamespace
     */
    private function initializeLocatorsToReturnNamespace(array $locators, $locatorNamespace)
    {
        foreach ($locators as $locator) {
            $locator->getSrcNamespace()->shouldBeCalled()->willReturn($locatorNamespace);
        }
    }

    /**
     * @param PSR0Locator[] $locatorsToBeRegistered
     */
    private function registerLocators(array $locatorsToBeRegistered)
    {
        $this->setStockResourceManager($this->manager);
        foreach ($locatorsToBeRegistered as $locator) {
            $this->registerLocator($locator);
        }
    }
}
