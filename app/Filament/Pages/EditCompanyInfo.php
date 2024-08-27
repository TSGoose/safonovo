<?php

namespace App\Filament\Pages;

use App\Models\CompanyInfo;
use Filament\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Throwable;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class EditCompanyInfo extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static string $view = 'filament.pages.edit-company-info';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(CompanyInfo::first()->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Main Information'))
                    ->collapsible()
                    ->columns(2)
                    ->description(__('Main information about your company that will be displayed on the website.'))
                    ->schema([
                        TextInput::make('email')
                            ->email()
                            ->label(__('Email'))
                            ->required()
                            ->prefixIcon('heroicon-m-envelope')
                            ->placeholder(__('Email'))
                            ->minLength(5)
                            ->maxLength(191),
                        PhoneInput::make('phone')
                            ->defaultCountry('RU')
                            ->label(__('Phone'))
                            ->prefixIcon('heroicon-m-phone')
                            ->placeholder(__('Phone'))
                            ->required(),
                        TextInput::make('address')
                            ->required()
                            ->label(__('Address'))
                            ->prefixIcon('heroicon-m-map')
                            ->minLength(5)
                            ->placeholder(__('Address'))
                            ->maxLength(191)
                            ->columnSpanFull(),
                    ]),
                Section::make(__('Company Socials'))
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        TextInput::make('facebook')
                            ->prefixIcon('heroicon-m-globe-alt')
                            ->placeholder('https://facebook.com/')
                            ->minLength(5)
                            ->maxLength(191)
                            ->label(__('Facebook')),
                        TextInput::make('instagram')
                            ->prefixIcon('heroicon-m-globe-alt')
                            ->placeholder('https://instagram.com/')
                            ->minLength(5)
                            ->maxLength(191)
                            ->label(__('Instagram')),
                        TextInput::make('twitter')
                            ->prefixIcon('heroicon-m-globe-alt')
                            ->placeholder('https://twitter.com/')
                            ->minLength(5)
                            ->maxLength(191)
                            ->label(__('Twitter')),
                        TextInput::make('vk')
                            ->prefixIcon('heroicon-m-globe-alt')
                            ->placeholder('https://vk.com/')
                            ->minLength(5)
                            ->maxLength(191)
                            ->label(__('VK')),
                    ]),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            CompanyInfo::first()->update($data);

            Notification::make()
                ->success()
                ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
                ->send();
        } catch (Throwable $exception) {
            Notification::make()
                ->danger()
                ->title(__('filament-panels::resources/pages/edit-record.notifications.failed.title'))
                ->body($exception->getMessage())
                ->send();

            return;
        }
    }

    public static function getNavigationLabel(): string
    {
        return __('Company Info');
    }

    public static function getLabel(): string
    {
        return __('Company Info');
    }

    public function getTitle(): string|Htmlable
    {
        return __('Company Info');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Company Infos');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Website');
    }
}
