<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait HasCache
{
    /**
     * Determine if cache key exists
     */
    public function cacheKeyExists(string $key): bool
    {
        return Cache::has($key);
    }

    /**
     * Get the value from cache
     */
    public function cacheGet(string $key, mixed $default = null): mixed
    {
        return Cache::get($key, $default);
    }

    /**
     * Store to cache forever and return value
     */
    public function cacheForever(string $key, mixed $data): bool
    {
        return Cache::forever($key, $data);
    }
}
