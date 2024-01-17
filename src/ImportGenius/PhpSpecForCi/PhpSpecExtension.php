<?php

namespace ImportGenius\PhpSpecForCi;

use PhpSpec\Extension\ExtensionInterface;
use PhpSpec\ServiceContainer;

class PhpSpecExtension implements ExtensionInterface
{
    /**
     * @var ServiceContainer
     */
    private $container;

    /**
     * @var string
     */
    private $classDoublesDir;

    public function __construct()
    {
        $this->classDoublesDir = dirname(dirname(dirname(__DIR__))) . '/ci_class_doubles';
    }

    /**
     * @param ServiceContainer $container
     */
    public function load(ServiceContainer $container)
    {
        $this
            ->setContainer($container)
            ->loadCodeigniterDoubles()
            ->registerDescribeCommand()
            ->registerClassNotFoundListener()
            ->registerResourceManager()
        ;
    }

    /**
     * @param ServiceContainer $container
     *
     * @return self
     */
    public function setContainer(ServiceContainer $container)
    {
        $this->container = $container;
        return $this;
    }

    /**
     * @param string $classDouble
     */
    private function loadClassDouble($classDouble)
    {
        require_once "{$this->classDoublesDir}/{$classDouble}.php";
    }

    /**
     * @return self
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function registerResourceManager()
    {
        $stockResourceManager = $this->container->get('locator.resource_manager');

        $this->container
            ->setShared(
                'locator.resource_manager',
                function (ServiceContainer $container) use ($stockResourceManager) {
                    $resourceManager = new ResourceManager;
                    $resourceManager->setStockResourceManager($stockResourceManager);
                    array_map([$resourceManager, 'registerLocator'], $container->getByPrefix('locator.locators'));

                    return $resourceManager;
                }
            );

        return $this;
    }

    private function getClassDoubleList()
    {
        return [
            'CI_Benchmark',
            'CI_Calendar',
            'CI_Cart',
            'CI_Config',
            'CI_Controller',
            'CI_DB_driver',
            'CI_DB_active_record',
            'CI_DB_cache',
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
     * @return self
     */
    private function loadCodeigniterDoubles()
    {
        if (!defined('BASEPATH')) {
            define('BASEPATH', '');
        }

        foreach ($this->getClassDoubleList() as $classDouble) {
            $this->loadClassDouble($classDouble);
        }

        return $this;
    }

    /**
     * @return self
     */
    public function registerClassNotFoundListener()
    {
        $this->container->setShared('event_dispatcher.listeners.class_not_found', function (ServiceContainer $c) {
            return new ClassNotFoundListener(
                $c->get('console.io'),
                $c->get('locator.resource_manager'),
                $c->get('code_generator')
            );
        });

        return $this;
    }

    /**
     * @return self
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function registerDescribeCommand()
    {
        $descCommand = $this->container->get('console.commands.describe');
        $this->container->setShared('console.commands.describe', function () use ($descCommand) {
            return DescribeCommandDecorator::decorate($descCommand);
        });

        return $this;
    }
}
