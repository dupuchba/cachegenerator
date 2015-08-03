<?php

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * ProjectServiceContainer.
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class ProjectServiceContainer extends Container
{
    private $parameters;
    private $targetDirs = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();
        $this->scopes = array();
        $this->scopeChildren = array();
        $this->methodMap = array(
            'dummy_manager' => 'getDummyManagerService',
            'test_cache' => 'getTestCacheService',
        );

        $this->aliases = array();
    }

    /**
     * {@inheritdoc}
     */
    public function compile()
    {
        throw new LogicException('You cannot compile a dumped frozen container.');
    }

    /**
     * Gets the 'dummy_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Temp\DummyManager A Temp\DummyManager instance.
     */
    protected function getDummyManagerService()
    {
        return $this->services['dummy_manager'] = new \Temp\DummyManager('foo', 'bar', 'baz', $this->get('test_cache'));
    }

    /**
     * Gets the 'test_cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Common\Cache\MemcachedCache A Doctrine\Common\Cache\MemcachedCache instance.
     */
    protected function getTestCacheService()
    {
        return $this->services['test_cache'] = new \Doctrine\Common\Cache\MemcachedCache();
    }
}
