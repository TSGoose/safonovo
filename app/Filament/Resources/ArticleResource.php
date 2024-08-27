<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use App\Traits\ResourceWithCache;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    use ResourceWithCache;

    protected static ?string $model = Article::class;

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->live(true)
                    ->label(__('Title'))
                    ->prefixIcon('heroicon-o-newspaper')
                    ->placeholder(__('Title'))
                    ->minLength(3)
                    ->afterStateUpdated(function (string $operation, $state, Set $set) {
                        if ($operation === 'create') {
                            $set('slug', Str::slug(trim($state)));
                        }
                    })
                    ->maxLength(191),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->minLength(3)
                    ->placeholder(__('Slug'))
                    ->prefixIcon('heroicon-o-hashtag')
                    ->label(__('Slug'))
                    ->maxLength(191),
                Section::make(__('Details'))
                    ->collapsible()
                    ->collapsed()
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        TextInput::make('author')
                            ->required()
                            ->label(__('Author'))
                            ->prefixIcon('heroicon-o-user')
                            ->placeholder(__('Author'))
                            ->minLength(3)
                            ->maxLength(191),
                        RichEditor::make('description')
                            ->required()
                            ->label(__('Description'))
                            ->placeholder(__('Description'))
                            ->minLength(3)
                            ->maxLength(191),
                        RichEditor::make('text')
                            ->required()
                            ->label(__('Text'))
                            ->placeholder(__('Text'))
                            ->minLength(3),
                        TagsInput::make('tags')
                            ->label(__('Tags'))
                            ->reorderable(),
                    ]),
                Section::make(__('Images'))
                    ->collapsible()
                    ->collapsed()
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->image()
                            ->label(__('Thumbnail'))
                            ->directory('production')
                            ->disk('public'),
                    ]),
                Toggle::make('is_active')
                    ->label(__('Status'))
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->limit(50)
                    ->description(fn (Article $record): string => $record->slug)
                    ->sortable()
                    ->label(__('Title'))
                    ->searchable(),
                TextColumn::make('author')
                    ->toggleable()
                    ->sortable()
                    ->icon('heroicon-o-user')
                    ->label(__('Author'))
                    ->searchable(),
                TextColumn::make('description')
                    ->limit(50)
                    ->searchable()
                    ->html()
                    ->grow()
                    ->label(__('Description'))
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('thumbnail')
                    ->circular()
                    ->label(__('Thumbnail'))
                    ->disk('public')
                    ->label(__('Thumbnail'))
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->defaultImageUrl(asset('img/no_image_placeholder.png')),
                TextColumn::make('tags')
                    ->badge()
                    ->separator(',')
                    ->label(__('Tags'))
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
                    ->label('Status')
                    ->sortable()
                    ->label(__('Status'))
                    ->tooltip(fn (Article $record) => $record->is_active ? __('Active') : __('Inactive'))
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
                        ->label(fn (Article $record) => $record->is_active ? __('Disable') : __('Enable'))
                        ->icon(fn (Article $record) => $record->is_active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->color(fn (Article $record) => $record->is_active ? 'danger' : 'success')
                        ->action(fn (Article $record) => $record->update(['is_active' => ! $record->is_active])),
                    DeleteAction::make(),
                ])
                    ->icon('heroicon-m-ellipsis-horizontal')
                    ->tooltip(__('Actions')),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('enable_selected')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->label(__('Enable Selected'))
                        ->action(fn (Collection $records) => $records->each(fn (Article $record) => $record->update(['is_active' => true])))
                        ->requiresConfirmation(),
                    BulkAction::make('disable_selected')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->label(__('Disable Selected'))
                        ->action(fn (Collection $records) => $records->each(fn (Article $record) => $record->update(['is_active' => false])))
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
            ->defaultSort('title', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageArticles::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Articles');
    }

    public static function getLabel(): string
    {
        return __('Article');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Articles');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Blog');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getCountFromCache(static::getModel());
    }
}
