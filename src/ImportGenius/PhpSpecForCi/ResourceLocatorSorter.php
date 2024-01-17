<?php

namespace ImportGenius\PhpSpecForCi;

use Exception;
use PhpSpec\Locator\PSR0\PSR0Locator;

class ResourceLocatorSorter
{
    /**
     * @var PSR0Locator
     */
    private $locators = [];

    /**
     * ResourceLocatorSorter constructor
     *
     * @param  PSR0Locator[] $locators
     * @throws EmptyArrayException
     */
    public function __construct(array $locators)
    {
        if (empty($locators)) {
            throw new EmptyArrayException;
        }

        foreach ($locators as $locator) {
            $this->addLocator($locator);
        }
    }

    /**
     * @param PSR0Locator $locator
     */
    private function addLocator(PSR0Locator $locator)
    {
        $this->locators[] = $locator;
    }

    /**
     * @return PSR0Locator[]
     */
    public function getLocators()
    {
        return $this->locators;
    }

    /**
     * @param  string        $className
     * @return PSR0Locator[] Array of locators
     */
    public function sortLocators($className)
    {
        $locators = $this->getLocators();
        $matchedLocatorsStack = [];
        while ($singleLocator = array_pop($locators)) {
            $this->shiftMatchingLocatorIntoStack($className, $singleLocator, $matchedLocatorsStack);
        }

        return $this->flattenMatchedLocatorStack($matchedLocatorsStack);
    }

    /**
     * @param  array $matchedLocators
     * @return array
     */
    private function flattenMatchedLocatorStack(array $matchedLocators)
    {
        $mergedLocators = [];
        krsort($matchedLocators);
        while ($arrLocator = array_pop($matchedLocators)) {
            $mergedLocators = array_merge($arrLocator, $mergedLocators);
        }
        return $mergedLocators;
    }

    /**
     * @param  $className
     * @param  $namespace
     * @return bool
     */
    private function suiteNamespaceAndClassIsCompatible($className, $namespace)
    {
        return empty($namespace) || (strpos($className, $namespace) !== false);
    }

    /**
     * @param $className
     * @param $singleLocator
     * @param $matchedLocators
     */
    private function shiftMatchingLocatorIntoStack($className, $singleLocator, &$matchedLocators)
    {
        $namespace = $singleLocator->getSrcNamespace();
        if ($this->suiteNamespaceAndClassIsCompatible($className, $namespace)) {
            $nsDepthCount = substr_count($namespace, '\\');
            if ((!isset($matchedLocators[$nsDepthCount]))) {
                $matchedLocators[$nsDepthCount] = [];
            }
            array_unshift($matchedLocators[$nsDepthCount], $singleLocator);
        }
    }
}

// @codingStandardsIgnoreStart
class EmptyArrayException extends Exception {}
// @codingStandardsIgnoreEnd
