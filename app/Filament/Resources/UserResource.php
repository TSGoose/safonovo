<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label(__('First Name'))
                    ->minLength(3)
                    ->placeholder(__('First Name'))
                    ->prefixIcon('heroicon-o-user')
                    ->maxLength(191),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->prefixIcon('heroicon-o-envelope')
                    ->label(__('Email'))
                    ->placeholder(__('Email'))
                    ->unique(ignoreRecord: true)
                    ->minLength(3)
                    ->maxLength(191),
                DateTimePicker::make('email_verified_at')
                    ->native(false)
                    ->prefixIcon('heroicon-o-check-circle')
                    ->placeholder(__('Verified At'))
                    ->label(__('Verified At')),
                TextInput::make('password')
                    ->password()
                    ->label(__('Password'))
                    ->minLength(3)
                    ->maxLength(191)
                    ->placeholder(__('Password'))
                    ->prefixIcon('heroicon-o-lock-closed')
                    ->beforeStateDehydrated(fn (string $state): string => bcrypt($state))
                    ->visible(fn ($operation): bool => $operation === 'create')
                    ->required()
                    ->revealable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->label(__('Name'))
                    ->searchable(),
                TextColumn::make('email')
                    ->icon('heroicon-m-envelope')
                    ->copyable()
                    ->copyMessage('Email address copied')
                    ->copyMessageDuration(1500)
                    ->sortable()
                    ->label(__('Email'))
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->label(__('Verified At'))
                    ->placeholder(__('Not Verified'))
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__('Created At'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->label(__('Updated At'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make(),
                    Action::make('verify')
                        ->label(fn (User $record) => $record->email_verified_at ? __('Unverify') : __('Verify'))
                        ->icon(fn (User $record) => $record->email_verified_at ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->color(fn (User $record) => $record->email_verified_at ? 'danger' : 'success')
                        ->action(fn (User $record) => $record->email_verified_at ? $record->forceFill(['email_verified_at' => null])->save() : $record->markEmailAsVerified()),
                    DeleteAction::make(),
                ])
                    ->icon('heroicon-m-ellipsis-horizontal')
                    ->tooltip(__('Actions')),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('verify_selected')
                        ->label(__('Verify Selected'))
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(fn (Collection $records) => $records->each(fn (User $record) => $record->markEmailAsVerified()))
                        ->requiresConfirmation(),
                    BulkAction::make('unverify_selected')
                        ->label(__('Unverify Selected'))
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(fn (Collection $records) => $records->each(fn (User $record) => $record->forceFill(['email_verified_at' => null])->save()))
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
            ->modifyQueryUsing(fn ($query) => $query->where('id', '!=', auth()->id()));
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Users');
    }

    public static function getLabel(): string
    {
        return __('User');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Users');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Website');
    }
}
