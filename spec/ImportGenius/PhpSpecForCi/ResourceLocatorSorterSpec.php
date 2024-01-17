<?php

namespace spec\ImportGenius\PhpSpecForCi;

use ImportGenius\PhpSpecForCi\EmptyArrayException;
use ImportGenius\PhpSpecForCi\ResourceLocatorSorter;
use ImportGenius\PhpSpecForCi\UnsupportedLocatorException;
use PhpSpec\Locator\PSR0\PSR0Locator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin ResourceLocatorSorter
 */
class ResourceLocatorSorterSpec extends ObjectBehavior
{
    function it_is_initializable(PSR0Locator $locator)
    {
        $this->beConstructedWith([$locator]);
        $this->shouldHaveType('ImportGenius\PhpSpecForCi\ResourceLocatorSorter');
    }

    function it_should_not_accept_an_empty_array()
    {
        $this->beConstructedWith([]);
        $this->shouldThrow(EmptyArrayException::class)->duringInstantiation();
    }

    function it_should_accept_an_array_containing_psr0_locator(PSR0Locator $locator)
    {
        $this->beConstructedWith($locators = [$locator, $locator]);
        $this->getLocators()->shouldReturn($locators);
    }

    function it_should_return_a_locator_without_a_namespace_when_a_class_without_namespace_is_used(
        PSR0Locator $locator
    )
    {
        $this->specifyGetSrcNamespaceBehaviorOf($locator, '');
        $this->beConstructedWith([$locator]);
        $this->sortLocators('Voila')->shouldReturn([$locator]);
    }

    function it_should_not_return_a_locator_with_namespace_when_a_class_without_namespace_is_used(
        PSR0Locator $locator
    ) {
        $this->specifyGetSrcNamespaceBehaviorOf($locator, 'Foo\Bar\Wow');
        $this->beConstructedWith([$locator]);
        $this->sortLocators('Test')->shouldReturn([]);
    }

    function it_should_return_a_locator_without_a_namespace_when_namespaced_class_is_used(
        PSR0Locator $locator
    ) {
        $this->specifyGetSrcNamespaceBehaviorOf($locator, '');
        $this->beConstructedWith([$locator]);
        $this->sortLocators('Foo\Bar')->shouldReturn([$locator]);
    }

    function it_should_return_a_locator_with_the_same_namespace_when_a_class_having_same_namespace_is_used(
        PSR0Locator $locator
    )
    {
        $this->specifyGetSrcNamespaceBehaviorOf($locator, 'Foo\Bar\Baz');
        $this->beConstructedWith([$locator]);
        $this->sortLocators('Foo\Bar\Baz\Wow')->shouldReturn([$locator]);
    }

    function it_should_not_return_a_locator_with_a_completely_different_namespace_when_a_namespaced_class_is_used(
        PSR0Locator $locator
    ) {
        $this->specifyGetSrcNamespaceBehaviorOf($locator, 'Awesome\Bar\Baz');
        $this->beConstructedWith([$locator]);
        $this->sortLocators('Foo\Bar\Baz\Wow')->shouldReturn([]);
    }

    function it_should_prioritize_the_locator_matching_the_namespace_than_locators_without_namespace(
        PSR0Locator $locatorWithMatchingNamespace,
        PSR0Locator $locatorWithoutNamespace
    ) {
        $this->specifyGetSrcNamespaceBehaviorOf($locatorWithMatchingNamespace, 'Foo\Bar\Baz');
        $this->specifyGetSrcNamespaceBehaviorOf($locatorWithoutNamespace, '');
        $this->beConstructedWith([$locatorWithMatchingNamespace, $locatorWithoutNamespace]);

        $this->sortLocators('Foo\Bar\Baz\Wow')->shouldReturn([$locatorWithMatchingNamespace, $locatorWithoutNamespace]);
    }

    function it_should_prioritize_the_locator_matching_the_namespace_with_the_deepest_level_than_other_matching_locator(
        PSR0Locator $locatorA,
        PSR0Locator $locatorB
    ) {
        $this->specifyGetSrcNamespaceBehaviorOf($locatorA, 'Foo\Bar\Baz');
        $this->specifyGetSrcNamespaceBehaviorOf($locatorB, 'Foo\Bar');
        $this->beConstructedWith([$locatorB, $locatorA]);

        $this->sortLocators('Foo\Bar\Baz\Wow')->shouldReturn([$locatorA, $locatorB]);
    }

    function it_should_prioritize_the_locator_matching_the_namespace_according_to_order_of_construction(
        PSR0Locator $locatorA,
        PSR0Locator $locatorB
    ) {
        $this->specifyGetSrcNamespaceBehaviorOf($locatorA, 'Foo\Bar\Baz');
        $this->specifyGetSrcNamespaceBehaviorOf($locatorB, 'Foo\Bar\Baz');
        $this->beConstructedWith([$locatorB, $locatorA]);

        $this->sortLocators('Foo\Bar\Baz\Wow')->shouldReturn([$locatorB, $locatorA]);
    }

    function it_should_sort_matching_locators(
        PSR0Locator $withoutNamespace,
        PSR0Locator $notMatchingNamespace,
        PSR0Locator $notMatchingNamespace_v2,
        PSR0Locator $matchingNamespaceAt1Level,
        PSR0Locator $matchingNamespaceAt2Level,
        PSR0Locator $matchingNamespaceAt3Level,
        PSR0Locator $matchingNamespaceAt3Level_v2
    ) {
        $className = 'Foo\Bar\Wow\SampleClass';
        $this->specifyGetSrcNamespaceBehaviorOf($withoutNamespace, '');
        $this->specifyGetSrcNamespaceBehaviorOf($notMatchingNamespace, 'Awesome\Wow\Foo');
        $this->specifyGetSrcNamespaceBehaviorOf($notMatchingNamespace_v2, 'Foo\Bar\Nice');
        $this->specifyGetSrcNamespaceBehaviorOf($matchingNamespaceAt1Level, 'Foo');
        $this->specifyGetSrcNamespaceBehaviorOf($matchingNamespaceAt2Level, 'Foo\Bar');
        $this->specifyGetSrcNamespaceBehaviorOf($matchingNamespaceAt3Level, 'Foo\Bar\Wow');
        $this->specifyGetSrcNamespaceBehaviorOf($matchingNamespaceAt3Level_v2, 'Foo\Bar\Wow');
        $this->beConstructedWith([
            $withoutNamespace,
            $notMatchingNamespace,
            $notMatchingNamespace_v2,
            $matchingNamespaceAt1Level,
            $matchingNamespaceAt2Level,
            $matchingNamespaceAt3Level,
            $matchingNamespaceAt3Level_v2
        ]);

        $this->sortLocators($className)->shouldReturn([
            $matchingNamespaceAt3Level,
            $matchingNamespaceAt3Level_v2,
            $matchingNamespaceAt2Level,
            $matchingNamespaceAt1Level,
            $withoutNamespace
        ]);
    }

    /**
     * @param PSR0Locator $locator
     * @param $returnedNamespace
     * @return mixed
     */
    private function specifyGetSrcNamespaceBehaviorOf(PSR0Locator $locator, $returnedNamespace)
    {
        return $locator
            ->getSrcNamespace()
            ->shouldBeCalledTimes(1)
            ->willReturn((empty($returnedNamespace)) ? '' : $returnedNamespace.'\\')
        ;
    }
}
