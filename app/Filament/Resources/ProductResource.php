<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Traits\ResourceWithCache;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    use ResourceWithCache;

    protected static ?string $model = Product::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $operation = $form->getOperation();
        $formContent = $operation === 'create' ? self::getCreateForm() : self::getEditForm();
        $formColumns = $operation === 'create' ? 1 : 2;

        return $form
            ->schema($formContent)
            ->columns($formColumns);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->label(__('Name'))
                    ->description(fn (Product $record): string => $record->slug)
                    ->searchable(),
                TextColumn::make('short_description')
                    ->limit(50)
                    ->label(__('Description'))
                    ->grow()
                    ->searchable()
                    ->toggleable()
                    ->html(),
                ImageColumn::make('images')
                    ->circular()
                    ->label(__('Images'))
                    ->disk('public')
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->defaultImageUrl(asset('img/no_image_placeholder.png')),
                TextColumn::make('price')
                    ->money('RUB')
                    ->label(__('Price'))
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('productType.name')
                    ->numeric()
                    ->label(__('Product Type'))
                    ->toggleable()
                    ->sortable(),
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
                    ->sortable()
                    ->tooltip(fn (Product $record) => $record->is_active ? __('Active') : __('Inactive'))
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
                        ->label(fn (Product $record) => $record->is_active ? __('Disable') : __('Enable'))
                        ->icon(fn (Product $record) => $record->is_active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->color(fn (Product $record) => $record->is_active ? 'danger' : 'success')
                        ->action(fn (Product $record) => $record->update(['is_active' => ! $record->is_active])),
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
                        ->action(fn (Collection $records) => $records->each(fn (Product $record) => $record->update(['is_active' => true])))
                        ->requiresConfirmation(),
                    BulkAction::make('disable_selected')
                        ->label(__('Disable Selected'))
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(fn (Collection $records) => $records->each(fn (Product $record) => $record->update(['is_active' => false])))
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
            'index' => Pages\ManageProducts::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Products');
    }

    public static function getLabel(): string
    {
        return __('Product');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Products');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Products');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getCountFromCache(static::getModel());
    }

    private static function getCreateForm(): array
    {
        return [
            Wizard::make([
                Step::make(__('General'))
                    ->icon('heroicon-o-cog')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->label(__('Name'))
                            ->placeholder(__('Name'))
                            ->prefixIcon('heroicon-o-shopping-bag')
                            ->live(true)
                            ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                if ($operation === 'create') {
                                    $set('slug', Str::slug(trim($state)));
                                }
                            })
                            ->minLength(3)
                            ->maxLength(191),
                        TextInput::make('slug')
                            ->required()
                            ->label(__('Slug'))
                            ->placeholder(__('Slug'))
                            ->prefixIcon('heroicon-o-hashtag')
                            ->unique(ignoreRecord: true)
                            ->minLength(3)
                            ->maxLength(191),
                    ]),
                Step::make(__('Details'))
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Group::make()->schema([
                            RichEditor::make('short_description')
                                ->required()
                                ->label(__('Short Description'))
                                ->placeholder(__('Short Description'))
                                ->minLength(3)
                                ->maxLength(191),
                            RichEditor::make('full_description')
                                ->required()
                                ->label(__('Full Description'))
                                ->placeholder(__('Full Description'))
                                ->minLength(3)
                                ->columnSpanFull(),
                        ]),
                        Fieldset::make()
                            ->label(__('Specifications'))
                            ->schema([
                                TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->label(__('Price'))
                                    ->placeholder(__('Price'))
                                    ->minValue(0)
                                    ->prefix('₽')
                                    ->default(0),
                                Select::make('product_type_id')
                                    ->relationship('productType', 'name')
                                    ->required()
                                    ->native(false)
                                    ->searchable()
                                    ->prefixIcon('heroicon-o-tag')
                                    ->preload()
                                    ->createOptionForm(static::getCreateProductTypeForm())
                                    ->label(__('Product Type'))
                                    ->placeholder(__('Select Product Type')),
                            ])->columns(2),
                        KeyValue::make('attributes')
                            ->label(__('Attributes'))
                            ->addActionLabel(__('Add'))
                            ->keyLabel(__('Key'))
                            ->keyPlaceholder(__('Key'))
                            ->valueLabel(__('Value'))
                            ->valuePlaceholder(__('Value'))
                            ->reorderable()
                            ->columnSpanFull(),
                    ]),
                Step::make(__('Images'))
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('images')
                            ->image()
                            ->label(__('Images'))
                            ->directory('products')
                            ->disk('public')
                            ->reorderable()
                            ->multiple()
                            ->appendFiles(),
                    ]),
            ])
                ->columnSpanFull(),
        ];
    }

    private static function getEditForm(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->label(__('Name'))
                ->prefixIcon('heroicon-o-shopping-bag')
                ->placeholder(__('Name'))
                ->live(true)
                ->afterStateUpdated(function (string $operation, $state, Set $set) {
                    if ($operation === 'create') {
                        $set('slug', Str::slug(trim($state)));
                    }
                })
                ->minLength(3)
                ->maxLength(191),
            TextInput::make('slug')
                ->required()
                ->label(__('Slug'))
                ->placeholder(__('Slug'))
                ->prefixIcon('heroicon-o-hashtag')
                ->unique(ignoreRecord: true)
                ->minLength(3)
                ->maxLength(191),
            Section::make(__('Details'))
                ->collapsible()
                ->collapsed()
                ->icon('heroicon-o-document-text')
                ->schema([
                    Group::make()->schema([
                        RichEditor::make('short_description')
                            ->required()
                            ->label(__('Short Description'))
                            ->placeholder(__('Short Description'))
                            ->minLength(3)
                            ->maxLength(191),
                        RichEditor::make('full_description')
                            ->required()
                            ->label(__('Full Description'))
                            ->placeholder(__('Full Description'))
                            ->minLength(3)
                            ->columnSpanFull(),
                    ]),
                    Fieldset::make()
                        ->label(__('Specifications'))
                        ->schema([
                            TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->label(__('Price'))
                                ->placeholder(__('Price'))
                                ->minValue(0)
                                ->prefix('₽')
                                ->default(0),
                            // Select::make('product_type_id')
                            //     ->relationship('productType', 'name')
                            //     ->required()
                            //     ->native(false)
                            //     ->prefixIcon('heroicon-o-tag')
                            //     ->searchable()
                            //     ->preload()
                            //     ->createOptionForm(static::getCreateProductTypeForm())
                            //     ->label(__('Product Type'))
                            //     ->placeholder(__('Select Product Type')),
                            SelectTree::make('product_type_id')
                                ->required()
                                ->label(__('Product Type'))
                                ->placeholder(__('Product Type'))
                                ->prefixIcon('heroicon-o-tag')
                                ->expandSelected(true)
                                ->searchable()
                                ->clearable(false)
                                ->relationship('productType', 'name', 'parent_id'),
                        ])->columns(2),
                    KeyValue::make('attributes')
                        ->label(__('Attributes'))
                        ->addActionLabel(__('Add'))
                        ->keyLabel(__('Key'))
                        ->keyPlaceholder(__('Key'))
                        ->valueLabel(__('Value'))
                        ->valuePlaceholder(__('Value'))
                        ->reorderable()
                        ->columnSpanFull(),
                ]),
            Section::make(__('Images'))
                ->collapsible()
                ->collapsed()
                ->icon('heroicon-o-photo')
                ->schema([
                    FileUpload::make('images')
                        ->image()
                        ->label(__('Images'))
                        ->directory('products')
                        ->disk('public')
                        ->reorderable()
                        ->multiple()
                        ->appendFiles(),
                ]),
            Toggle::make('is_active')
                ->label(__('Status'))
                ->default(true),
        ];
    }

    protected static function getCreateProductTypeForm(): array
    {
        return [
            Group::make()->schema([
                TextInput::make('name')
                    ->required()
                    ->minLength(3)
                    ->maxLength(191)
                    ->label(__('Name'))
                    ->live(true)
                    ->placeholder(__('Name'))
                    ->prefixIcon('heroicon-o-tag')
                    ->afterStateUpdated(function ($state, Set $set) {
                        $set('code', Str::slug(trim($state)));
                    }),
                TextInput::make('code')
                    ->required()
                    ->unique()
                    ->label(__('Code'))
                    ->prefixIcon('heroicon-o-hashtag')
                    ->placeholder(__('Code'))
                    ->minLength(3)
                    ->maxLength(191),
            ])
                ->columns(2),
            RichEditor::make('description')
                ->minLength(3)
                ->maxLength(191)
                ->label(__('Description'))
                ->placeholder(__('Description'))
                ->columnSpanFull(),
            SelectTree::make('parent_id')
                ->label(__('Parent Product Type'))
                ->placeholder(__('Parent Product Type'))
                ->prefixIcon('heroicon-o-tag')
                ->expandSelected(false)
                ->columnSpanFull()
                ->relationship('parentProductType', 'name', 'parent_id'),
        ];
    }
}
