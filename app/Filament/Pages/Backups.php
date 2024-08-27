<?php

namespace App\Filament\Pages;

use ShuvroRoy\FilamentSpatieLaravelBackup\Pages\Backups as BaseBackups;

class Backups extends BaseBackups
{
    protected static ?int $navigationSort = 9;

    public static function getNavigationGroup(): ?string
    {
        return __('Settings');
    }
}
