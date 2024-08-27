<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Enums\OrderStatus;
use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Builder;

class ManageOrders extends ManageRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            __('All Orders') => Tab::make(),
            __('Pending Orders') => Tab::make()
                ->icon('heroicon-o-question-mark-circle')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', OrderStatus::PENDING)),
            __('Processing Orders') => Tab::make()
                ->icon('heroicon-o-clock')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', OrderStatus::PROCESSING)),
            __('Completed Orders') => Tab::make()
                ->icon('heroicon-o-check-circle')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', OrderStatus::COMPLETED)),
            __('Canceled Orders') => Tab::make()
                ->icon('heroicon-o-x-circle')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', OrderStatus::CANCELED)),
        ];
    }
}
