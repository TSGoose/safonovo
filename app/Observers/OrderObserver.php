<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\User;
use Filament\Notifications\Notification;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        Notification::make()
            ->title(__('New order'))
            ->body(__('Product').' - '.$order->product->name.'. '.__('Quantity').' - '.$order->quantity)
            ->info()
            ->sendToDatabase(User::first());
    }
}
