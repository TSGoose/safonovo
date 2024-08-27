<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductTypeResource\Pages\ManageProductTypes;
use App\Models\ProductType;
use App\Traits\ResourceWithCache;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ProductTypeResource extends Resource
{
    use ResourceWithCache;

    protected static ?string $model = ProductType::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label(__('Name'))
                    ->minLength(3)
                    ->placeholder(__('Name'))
                    ->prefixIcon('heroicon-o-tag')
                    ->maxLength(191)
                    ->live(true)
                    ->afterStateUpdated(function (string $operation, $state, Set $set) {
                        if ($operation === 'create') {
                            $set('code', Str::slug(trim($state)));
                        }
                    }),
                TextInput::make('code')
                    ->required()
                    ->label(__('Code'))
                    ->prefixIcon('heroicon-o-hashtag')
                    ->placeholder(__('Code'))
                    ->unique(ignoreRecord: true)
                    ->minLength(3)
                    ->maxLength(191),
                SelectTree::make('parent_id')
                    ->label(__('Parent Product Type'))
                    ->placeholder(__('Parent Product Type'))
                    ->prefixIcon('heroicon-o-tag')
                    ->expandSelected(false)
                    ->disabledOptions(fn (?ProductType $record): array => $record === null ? [] : [$record->id])
                    ->columnSpanFull()
                    ->relationship('parentProductType', 'name', 'parent_id'),
                RichEditor::make('description')
                    ->minLength(3)
                    ->label(__('Description'))
                    ->placeholder(__('Description'))
                    ->maxLength(191)
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label(__('Status'))
                    ->default(true),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->label(__('Name'))
                    ->description(fn (ProductType $record): string => $record->code)
                    ->searchable(),
                TextColumn::make('description')
                    ->searchable()
                    ->grow()
                    ->wrap()
                    ->toggleable()
                    ->label(__('Description'))
                    ->html(),
                TextColumn::make('product_count')
                    ->numeric()
                    ->label(__('Products'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__('Created At'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__('Updated At'))
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_active')
                    ->label(__('Status'))
                    ->tooltip(fn (ProductType $record) => $record->is_active ? __('Active') : __('Inactive'))
                    ->sortable()
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('is_active')
                    ->label(__('Status'))
                    ->options([
                        '1' => __('Active'),
                        '0' => __('Inactive'),
                    ])
                    ->native(false),
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make(),
                    Action::make('change_status')
                        ->label(fn (ProductType $record) => $record->is_active ? __('Disable') : __('Enable'))
                        ->icon(fn (ProductType $record) => $record->is_active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->color(fn (ProductType $record) => $record->is_active ? 'danger' : 'success')
                        ->action(fn (ProductType $record) => $record->update(['is_active' => ! $record->is_active])),
                    DeleteAction::make(),
                ])
                    ->icon('heroicon-m-ellipsis-horizontal')
                    ->tooltip(__('Actions')),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('enable_selected')
                        ->label(__('Enable Selected'))
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(fn (Collection $records) => $records->each(fn (ProductType $record) => $record->update(['is_active' => true])))
                        ->requiresConfirmation(),
                    BulkAction::make('disable_selected')
                        ->label(__('Disable Selected'))
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(fn (Collection $records) => $records->each(fn (ProductType $record) => $record->update(['is_active' => false])))
                        ->requiresConfirmation(),
                    DeleteBulkAction::make(),
                ]),
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
            ->defaultSort('name', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageProductTypes::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Product Types');
    }

    public static function getLabel(): string
    {
        return __('Product Type');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Product Types');
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
