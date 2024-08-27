<?php

namespace App\Listeners;

use App\Models\User;
use Filament\Notifications\Notification;

class SuccessfulBackupListener
{
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Notification::make()
            ->title(__('Successful Backup'))
            ->body(__('New backup created') . ' - ' . now()->format('d-m-Y H:i'))
            ->success()
            ->sendToDatabase(User::first());
    }
}
