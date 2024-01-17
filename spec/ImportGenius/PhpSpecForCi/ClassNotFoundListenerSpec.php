<?php

namespace spec\ImportGenius\PhpSpecForCi;

use ImportGenius\PhpSpecForCi\ClassNotFoundListener;
use PhpSpec\CodeGenerator\GeneratorManager;
use PhpSpec\Console\IO;
use PhpSpec\Event\ExampleEvent;
use PhpSpec\Event\SuiteEvent;
use PhpSpec\Loader\Node\SpecificationNode;
use PhpSpec\Loader\Suite;
use PhpSpec\Locator\ResourceInterface;
use PhpSpec\Locator\ResourceManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Exception\Doubler\ClassNotFoundException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * @mixin ClassNotFoundListener
 */
class ClassNotFoundListenerSpec extends ObjectBehavior
{
    /**
     * @var IO
     */
    private $io;

    /**
     * @var ResourceManagerInterface
     */
    private $resourceManager;

    private $generator;

    function let(IO $io, ResourceManagerInterface $resourceManager, GeneratorManager $generator)
    {
        $this->io = $io;
        $this->resourceManager = $resourceManager;
        $this->generator = $generator;
        $this->beConstructedWith($io, $resourceManager, $generator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ImportGenius\PhpSpecForCi\ClassNotFoundListener');
        $this->shouldHaveType(EventSubscriberInterface::class);
    }

    function it_should_return_subscribed_events()
    {
        $subscribedEvents = [
            'afterExample' => array('afterExample', 10),
            'afterSuite'   => array('afterSuite', -10)
        ];
        $this->getSubscribedEvents()->shouldBeArray();
        $this->getSubscribedEvents()->shouldReturn($subscribedEvents);
    }

    function it_should_ignore_example_events_not_containing_class_not_found_exceptions(ExampleEvent $exampleEvent)
    {
        $exampleEvent->getException()->shouldBeCalledTimes(1)->willReturn(null);
        $this->afterExample($exampleEvent);
    }

    function it_should_handle_after_example_event(ExampleEvent $exampleEvent, ClassNotFoundException $exception1)
    {
        $exampleEvent->getException()->willReturn(new \Exception());
        $this->afterExample($exampleEvent);
        $exampleEvent->getException()->willReturn($exception1);
        $exception1->getClassname()->shouldBeCalledTimes(1);
        $this->afterExample($exampleEvent);
    }

    function it_should_resolve_resource_matching_given_class_name_to_specification_in_stack(
        SuiteEvent $event,
        ExampleEvent $exampleEvent,
        ClassNotFoundException $prophecyException,
        Suite $suite,
        SpecificationNode $specificationNode,
        ResourceInterface $resource
    )
    {
        $className = $this->setupClassNotFoundPrecondition($exampleEvent, $prophecyException);
        $this->setupSpecificationNodesReturnedBySuite($event, $suite, [$specificationNode]);

        $specificationNode->getResource()->willReturn($resource);
        $resource->getSrcClassname()->willReturn($className);
        $this->resourceManager->createResource($className)->shouldNotBeCalled();

        $this->afterExample($exampleEvent);
        $this->resolveResource($event, $className)->shouldReturn($resource);
    }

    function it_should_resolve_resource_from_given_suite_event_and_class_name(
        SuiteEvent $suiteEvent,
        ExampleEvent $exampleEvent,
        ClassNotFoundException $prophecyException,
        Suite $suite
    )
    {
        $className = $this->setupClassNotFoundPrecondition($exampleEvent, $prophecyException);

        $this->setupSpecificationNodesReturnedBySuite($suiteEvent, $suite, []);

        $this->resourceManager->createResource($className)->shouldBeCalledTimes(1)->willReturn($fakeResource = 'wow');
        $this->afterExample($exampleEvent);

        $this->resolveResource($suiteEvent, $className)->shouldReturn($fakeResource);
    }

    function it_should_not_attempt_to_create_source_class_when_class_name_stack_is_empty(SuiteEvent $event)
    {
        $this->io->isCodeGenerationEnabled()->shouldBeCalledTimes(1)->willReturn(true);
        $this->afterSuite($event);
    }

    function it_should_not_attempt_to_create_source_class_when_code_generation_is_disabled(SuiteEvent $event)
    {
        $this->io->isCodeGenerationEnabled()->shouldBeCalledTimes(1)->willReturn(false);
        $this->afterSuite($event);
    }

    function it_should_attempt_to_create_non_existing_source_class(
        SuiteEvent $suiteEvent,
        ExampleEvent $exampleEvent,
        ClassNotFoundException $prophecyException,
        Suite $suite,
        ResourceInterface $resource
    )
    {
        $className = $this->setupClassNotFoundPrecondition($exampleEvent, $prophecyException);

        $this->io->isCodeGenerationEnabled()->shouldBeCalledTimes(1)->willReturn(true);
        $this->io->askConfirmation("Do you want me to create `{$className}` for you?")->willReturn(true);

        $this->setupSpecificationNodesReturnedBySuite($suiteEvent, $suite, []);
        $this->resourceManager->createResource($className)->willReturn($resource);
        $suiteEvent->markAsWorthRerunning()->shouldBeCalledTimes(1);

        $this->afterExample($exampleEvent);
        $this->afterSuite($suiteEvent);
    }

    /**
     * @param ExampleEvent $exampleEvent
     * @param ClassNotFoundException $prophecyException
     * @return string
     */
    private function setupClassNotFoundPrecondition(ExampleEvent $exampleEvent, ClassNotFoundException $prophecyException)
    {
        $exampleEvent->getException()->willReturn($prophecyException);
        $prophecyException->getClassname()->willReturn($className = 'FooBar\IsAwesome');
        return $className;
    }

    /**
     * @param SuiteEvent $suiteEvent
     * @param Suite $suite
     * @param $returnedSpecNodes
     */
    private function setupSpecificationNodesReturnedBySuite(SuiteEvent $suiteEvent, Suite $suite, $returnedSpecNodes)
    {
        $suiteEvent->getSuite()->willReturn($suite);
        $suite->getSpecifications()->willReturn($returnedSpecNodes);
    }
}
