<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Traits\ResourceWithCache;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductsOverview extends BaseWidget
{
    use ResourceWithCache;

    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make(__('Total Products'), static::getCountFromCache(Product::class))
                ->description(__('All Products'))
                ->color('primary'),
            Stat::make(__('Active Products'), Product::where('is_active', true)->count())
                ->description(__('Active Products which can be ordered and shown on the site'))
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make(__('Inactive Products'), Product::where('is_active', false)->count())
                ->description(__('Inactive products, which cannot be ordered or shown on the site'))
                ->descriptionIcon('heroicon-o-x-circle')
                ->color('danger'),
        ];
    }
}
