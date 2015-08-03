<?php

namespace temp;

use CacheGenerator\CustomCacheProvider;

class DummyManager
{
    /**
     * @var string
     */
    private $foo;

    /**
     * @var string
     */
    private $bar;

    /**
     * @var string
     */
    private $baz;

    /**
     * @var CustomCacheProvider
     */
    private $cache;

    /**
     * DummyManager constructor.
     *
     * @param string              $foo
     * @param string              $bar
     * @param string              $baz
     * @param CustomCacheProvider $cache
     */
    public function __construct($foo, $bar, $baz, CustomCacheProvider $cache)
    {
        $this->foo = $foo;
        $this->bar = $bar;
        $this->baz = $baz;
        $this->cache = $cache;
    }
}
