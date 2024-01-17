<?php

namespace ImportGenius\PhpSpecForCi;

use Exception;
use PhpSpec\Locator\PSR0\PSR0Locator;
use PhpSpec\Locator\ResourceLocatorInterface;
use PhpSpec\Locator\ResourceManager as BaseResourceManager;
use PhpSpec\Locator\ResourceManagerInterface;

class ResourceManager extends BaseResourceManager
{
    /**
     * @var ResourceManagerInterface
     */
    private $resourceManager;

    /**
     * @var ResourceLocatorInterface[]
     */
    private $locators = [];

    /**
     * @inheritDoc
     */
    public function locateResources($query)
    {
        return $this->getStockResourceManager()->locateResources($query);
    }

    /**
     * @param  PSR0Locator[] $locators
     * @return PSR0Locator
     * @throws AmbiguousSuiteScopeForClassException
     */
    private function findOneLocator(array $locators)
    {
        if ($locators[0]->getSrcNamespace() !== $locators[1]->getSrcNamespace()) {
            return $locators[0];
        }

        throw new AmbiguousSuiteScopeForClassException;
    }

    /**
     * @param  PSR0Locator[] $sortedLocators
     * @return PSR0Locator
     * @throws AmbiguousSuiteScopeForClassException
     * @throws CannotFindSuiteScopeForClassException
     */
    private function findSuitableLocator(array $sortedLocators)
    {
        if (count($sortedLocators) === 1) {
            return $sortedLocators[0];
        }

        if (count($sortedLocators) > 1) {
            return $this->findOneLocator($sortedLocators);
        }

        throw new CannotFindSuiteScopeForClassException;
    }

    /**
     * @inheritDoc
     */
    public function createResource($classname)
    {
        $locatorFinder = new ResourceLocatorSorter($this->getLocators());
        $sortedLocators = $locatorFinder->sortLocators($classname);

        return $this->findSuitableLocator($sortedLocators)->createResource($classname);
    }

    /**
     * @param  ResourceManagerInterface $resourceManager
     * @return ResourceManager
     * @throws ResourceManagerAlreadySetException
     */
    public function setStockResourceManager(ResourceManagerInterface $resourceManager)
    {
        if ($this->resourceManager) {
            throw new ResourceManagerAlreadySetException;
        }

        $this->resourceManager = $resourceManager;

        return $this;
    }

    /**
     * @return ResourceManagerInterface
     * @throws ResourceManagerNotSetException
     */
    public function getStockResourceManager()
    {
        if (!$this->resourceManager) {
            throw new ResourceManagerNotSetException;
        }

        return $this->resourceManager;
    }

    /**
     * @param  ResourceLocatorInterface $locator
     * @return self
     */
    public function registerLocator(ResourceLocatorInterface $locator)
    {
        $this->locators[] = $locator;
        $this->getStockResourceManager()->registerLocator($locator);

        return $this;
    }

    /**
     * @return ResourceLocatorInterface[]
     */
    public function getLocators()
    {
        return $this->locators;
    }
}

// @codingStandardsIgnoreStart
class ResourceManagerAlreadySetException extends Exception {}
class ResourceManagerNotSetException extends Exception {}
class CannotFindSuiteScopeForClassException extends Exception {}
class AmbiguousSuiteScopeForClassException extends Exception {}
// @codingStandardsIgnoreEnd
