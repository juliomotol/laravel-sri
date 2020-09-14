<?php

namespace Elhebert\SubresourceIntegrity\Contracts;

interface SriCacheManager extends \Psr\SimpleCache\CacheInterface
{
    /**
     * Get the path to the sri hash cache file.
     *
     * @return string
     */
    public function getCachedSriPath();
}
