<?php

namespace ImportGenius\PhpSpecForCi;

use PhpSpec\CodeGenerator\GeneratorManager;
use PhpSpec\Console\IO;
use PhpSpec\Event\ExampleEvent;
use PhpSpec\Event\SuiteEvent;
use PhpSpec\Exception\Fracture\ClassNotFoundException as PhpSpecClassException;
use PhpSpec\Locator\ResourceInterface;
use PhpSpec\Locator\ResourceManagerInterface;
use Prophecy\Exception\Doubler\ClassNotFoundException as ProphecyClassException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ClassNotFoundListener implements EventSubscriberInterface
{
    /**
     * @var IO
     */
    private $consoleIo;

    /**
     * @var ResourceManagerInterface
     */
    private $resources;

    /**
     * @var GeneratorManager
     */
    private $generator;

    /**
     * @var array
     */
    private $classes = [];

    /**
     * @param IO $consoleIo
     * @param ResourceManagerInterface $resources
     * @param GeneratorManager $generator
     */
    public function __construct(IO $consoleIo, ResourceManagerInterface $resources, GeneratorManager $generator)
    {
        $this->consoleIo = $consoleIo;
        $this->resources = $resources;
        $this->generator = $generator;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            'afterExample' => array('afterExample', 10),
            'afterSuite'   => array('afterSuite', -10),
        ];
    }

    /**
     * @param ExampleEvent $event
     */
    public function afterExample(ExampleEvent $event)
    {
        if (null === $exception = $event->getException()) {
            return;
        }

        if (!($exception instanceof PhpSpecClassException) &&
            !($exception instanceof ProphecyClassException)) {
            return;
        }

        $this->classes[$exception->getClassname()] = true;
    }

    /**
     * @param SuiteEvent $event
     */
    public function afterSuite(SuiteEvent $event)
    {
        if (!$this->consoleIo->isCodeGenerationEnabled()) {
            return;
        }

        foreach (array_keys($this->classes) as $classname) {
            $message = sprintf('Do you want me to create `%s` for you?', $classname);

            if ($this->consoleIo->askConfirmation($message)) {
                $this->generator->generate($this->resolveResource($event, $classname), 'class');
                $event->markAsWorthRerunning();
            }
        }
    }

    /**
     * @param SuiteEvent $event
     * @param $classname
     *
     * @return ResourceInterface
     */
    public function resolveResource(SuiteEvent $event, $classname)
    {
        foreach ($event->getSuite()->getSpecifications() as $specification) {
            $resource = $specification->getResource();
            if ($resource->getSrcClassname() === $classname) {
                return $resource;
            }
        }

        return $this->resources->createResource($classname);
    }
}
