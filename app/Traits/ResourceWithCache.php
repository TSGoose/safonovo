<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

trait ResourceWithCache
{
    /**
     * Get the count of the model from the cache.
     */
    public static function getCountFromCache(string $model): int
    {
        if (! class_exists($model) || ! is_subclass_of($model, Model::class)) {
            throw new \RuntimeException('The provided class name must be a valid Eloquent model.');
        }

        $cacheKey = static::generateCacheKey($model);

        $count = null;
        if (Cache::has($cacheKey)) {
            $count = Cache::get($cacheKey);
        } else {
            $count = $model::query()->count();
            Cache::remember($cacheKey, 60 * 5, fn () => $count);
        }

        return $count;
    }

    /**
     * Generate a cache key for the model.
     */
    protected static function generateCacheKey(string $modelClass): string
    {
        return Str::slug($modelClass).'_count';
    }
}
