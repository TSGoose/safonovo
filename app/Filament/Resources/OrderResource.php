<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatus;
use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Traits\ResourceWithCache;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Actions\Action as InfoAction;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\Section as InfoSection;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    use ResourceWithCache;

    protected static ?string $model = Order::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    public static function infoList(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Split::make([
                    InfoSection::make([
                        TextEntry::make('product.name')
                            ->icon('heroicon-m-shopping-bag')
                            ->label(__('Product')),
                        TextEntry::make('email')
                            ->icon('heroicon-m-envelope')
                            ->label(__('Email')),
                        Fieldset::make(__('Order Details'))
                            ->schema([
                                TextEntry::make('price')
                                    ->numeric()
                                    ->money('RUB')
                                    ->label(__('Price')),
                                TextEntry::make('quantity')
                                    ->numeric()
                                    ->label(__('Quantity')),
                            ])->columns(2),
                    ]),
                    InfoSection::make([
                        TextEntry::make('created_at')
                            ->label(__('Created At'))
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->label(__('Updated At'))
                            ->dateTime(),
                        TextEntry::make('status')
                            ->label(__('Status'))
                            ->badge()
                            ->icon(fn (Order $record): string => match ($record->status) {
                                OrderStatus::PENDING => 'heroicon-o-question-mark-circle',
                                OrderStatus::COMPLETED => 'heroicon-o-check-circle',
                                OrderStatus::CANCELED => 'heroicon-o-x-circle',
                                OrderStatus::PROCESSING => 'heroicon-o-clock',
                            })
                            ->color(fn (Order $record): string => match ($record->status) {
                                OrderStatus::PENDING => 'warning',
                                OrderStatus::COMPLETED => 'success',
                                OrderStatus::CANCELED => 'danger',
                                OrderStatus::PROCESSING => 'info',
                                default => 'secondary',
                            })
                            ->suffixActions([
                                InfoAction::make('accept')
                                    ->color('success')
                                    ->visible(fn (Order $record): bool => $record->status === OrderStatus::PENDING)
                                    ->icon('heroicon-o-check-circle')
                                    ->tooltip(__('Accept Order'))
                                    ->action(fn (Order $record) => $record->update(['status' => OrderStatus::PROCESSING])),
                                InfoAction::make('complete')
                                    ->visible(fn (Order $record): bool => $record->status === OrderStatus::PROCESSING)
                                    ->icon('heroicon-o-check-circle')
                                    ->tooltip(__('Complete Order'))
                                    ->action(fn (Order $record) => $record->update(['status' => OrderStatus::COMPLETED]))
                                    ->color('success'),
                                InfoAction::make('cancel')
                                    ->color('danger')
                                    ->visible(fn (Order $record): bool => $record->status === OrderStatus::PENDING || $record->status === OrderStatus::PROCESSING)
                                    ->icon('heroicon-o-x-circle')
                                    ->action(fn (Order $record) => $record->update(['status' => OrderStatus::CANCELED]))
                                    ->tooltip(__('Cancel Order')),
                            ]),
                    ])
                        ->grow(false),
                ])
                    ->from('md'),
            ]);
    }

    /**
     * Edit order form.
     * !Disabled
     * Replaced with view page. To enable either disable edit page or create a new separate edit page.
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->relationship('product', 'name')
                    ->label(__('Product'))
                    ->native(false)
                    ->searchable()
                    ->prefixIcon('heroicon-o-shopping-bag')
                    ->preload()
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->placeholder(__('Email'))
                    ->prefixIcon('heroicon-o-envelope')
                    ->label(__('Email'))
                    ->required()
                    ->maxLength(191),
                Section::make(__('Order Details'))
                    ->columns(3)
                    ->collapsible()
                    ->schema([
                        TextInput::make('quantity')
                            ->required()
                            ->label(__('Quantity'))
                            ->prefixIcon('heroicon-o-shopping-cart')
                            ->default(1)
                            ->placeholder(__('Quantity'))
                            ->numeric(),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->placeholder(__('Price'))
                            ->default(0)
                            ->label(__('Price'))
                            ->prefix('₽'),
                        Select::make('status')
                            ->label(__('Status'))
                            ->native(false)
                            ->options(function (): array {
                                $values = [];

                                foreach (OrderStatus::cases() as $status) {
                                    $values[$status->value] = __(ucfirst((string) $status->value));
                                }

                                return $values;
                            })
                            ->default(fn () => OrderStatus::PENDING->value)
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')
                    ->numeric()
                    ->label(__('Product'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('quantity')
                    ->numeric()
                    ->label(__('Quantity'))
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('price')
                    ->money('RUB')
                    ->label(__('Price'))
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('email')
                    ->sortable()
                    ->label(__('Email'))
                    ->searchable(),
                TextColumn::make('status')
                    ->label(__('Status'))
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->badge()
                    ->color(fn (Order $record): string => match ($record->status) {
                        OrderStatus::PENDING => 'warning',
                        OrderStatus::COMPLETED => 'success',
                        OrderStatus::PROCESSING => 'info',
                        OrderStatus::CANCELED => 'danger',
                    })
                    ->icon(fn (Order $record): string => match ($record->status) {
                        OrderStatus::PENDING => 'heroicon-o-question-mark-circle',
                        OrderStatus::COMPLETED => 'heroicon-o-check-circle',
                        OrderStatus::PROCESSING => 'heroicon-o-clock',
                        OrderStatus::CANCELED => 'heroicon-o-x-circle',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->label(__('Created At'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->label(__('Updated At'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                ActionGroup::make([
                    Action::make('accept')
                        ->label(__('Accept Order'))
                        ->icon('heroicon-m-check-circle')
                        ->color('info')
                        ->action(fn (Order $record) => $record->update(['status' => OrderStatus::PROCESSING]))
                        ->visible(fn (Order $record): bool => $record->status == OrderStatus::PENDING)
                        ->requiresConfirmation(),
                    Action::make('complete')
                        ->label(__('Complete Order'))
                        ->icon('heroicon-m-check-circle')
                        ->color('success')
                        ->action(fn (Order $record) => $record->update(['status' => OrderStatus::COMPLETED]))
                        ->visible(fn (Order $record): bool => $record->status == OrderStatus::PROCESSING)
                        ->requiresConfirmation(),
                    Action::make('cancel')
                        ->label(__('Cancel Order'))
                        ->icon('heroicon-m-x-circle')
                        ->color('danger')
                        ->action(fn (Order $record) => $record->update(['status' => OrderStatus::CANCELED]))
                        ->hidden(fn (Order $record): bool => $record->status == OrderStatus::CANCELED || $record->status == OrderStatus::COMPLETED)
                        ->extraAttributes(['style' => 'border-bottom: 1px solid gray; border-bottom-left-radius: 0; border-bottom-right-radius: 0;'])
                        ->requiresConfirmation(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
                    ->icon('heroicon-m-ellipsis-horizontal')
                    ->tooltip(__('Actions')),
            ])
            ->bulkActions([
                BulkActionGroup::make([]),
            ])
            ->toggleColumnsTriggerAction(
                fn (Action $action) => $action
                    ->button()
                    ->label(__('Columns')),
            )
            ->filtersTriggerAction(
                fn (Action $action) => $action
                    ->button()
                    ->label(__('Filters')),
            )
            ->defaultSort('created_at', 'asc');
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Orders');
    }

    public static function getLabel(): string
    {
        return __('Order');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Orders');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Products');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getCountFromCache(static::getModel());
    }
}
