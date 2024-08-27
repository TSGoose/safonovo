<?php

namespace App\Filament\Pages;

use Illuminate\Contracts\Support\Htmlable;
use ShuvroRoy\FilamentSpatieLaravelHealth\Pages\HealthCheckResults as BaseHealthCheckResults;

class Health extends BaseHealthCheckResults
{
    protected static ?int $navigationSort = 8;

    public static function getNavigationGroup(): ?string
    {
        return __('Settings');
    }

    public function getHeading(): string|Htmlable
    {
        return __('Application Health');
    }

    public static function getNavigationLabel(): string
    {
        return __('Application Health');
    }

    public static function getLabel(): string
    {
        return __('Application Health');
    }

    public function getTitle(): string|Htmlable
    {
        return __('Application Health');
    }
}
