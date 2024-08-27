<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Pages\Dashboard as OriginalDashboard;

class Dashboard extends OriginalDashboard
{
    public function getHeaderActions(): array
    {
        return [
            Action::make('edit-company-info')
                ->icon('heroicon-o-document-text')
                ->label(__('Company Info'))
                ->action(function () {
                    return redirect()->route('filament.admin.pages.edit-company-info');
                }),
        ];
    }
}
