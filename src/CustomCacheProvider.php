<?php

namespace CacheGenerator;

use Doctrine\Common\Cache\CacheProvider;

class CustomCacheProvider
{
    /**
     * @var int
     */
    private $ttl;

    /**
     * @var CacheProvider
     */
    private $cache;

    /**
     * CustomCacheProvider constructor.
     *
     * @param int           $ttl
     * @param CacheProvider $cache
     */
    public function __construct($ttl, CacheProvider $cache)
    {
        $this->ttl = $ttl;
        $this->cache = $cache;
    }

    /**
     * @return int
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * @param int $ttl
     */
    public function setTtl($ttl)
    {
        $this->ttl = $ttl;
    }
}
