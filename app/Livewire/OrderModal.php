<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Product;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use LaraZeus\Quantity\Components\Quantity;
use Livewire\Component;
use Telegram\Bot\Api;

class OrderModal extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Product $product;

    public function mount(Product $product): void
    {
        $this->form->fill();
        $this->product = $product;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Placeholder::make('price')
                    ->label(__('Price'))
                    ->content(function (Product $product): string {
                        return $product->price.' ₽';
                    }),
                TextInput::make('email')
                    ->email()
                    ->label(__('Email'))
                    ->placeholder(__('Email'))
                    ->prefixIcon('heroicon-o-envelope')
                    ->required(),
                Quantity::make('quantity')
                    ->label(__('Quantity'))
                    ->default(1)
                    ->minValue(1)
                    ->numeric()
                    ->hint(new HtmlString(Blade::render('<x-filament::loading-indicator class="w-4 h-4" wire:loading wire:target="data.quantity" />')))
                    ->prefixIcon('heroicon-o-shopping-bag')
                    ->required(),
                Placeholder::make('total')
                    ->label(__('Total'))
                    ->content(
                        fn (Product $product, Get $get): string => number_format($product->price * $get('quantity'), 2).' ₽'
                    ),
            ])
            ->statePath('data')
            ->model($this->product);
    }

    public function render(): View
    {
        return view('livewire.order-modal');
    }

    public function order()
    {
        $data = $this->form->getState();
        $total = $this->product->price * $data['quantity'];

        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        $message = 'Новый заказ!
Товар - '.$this->product->name.'
Заказчик - '.$data['email'].'
Количество - '.$data['quantity'].'
Общая стоимость - '.$total.' ₽';

        try {
            $telegram->sendMessage([
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'text' => $message,
            ]);

            Order::create([
                'product_id' => $this->product->id,
                'quantity' => $data['quantity'],
                'price' => $total,
                'email' => $data['email'],
            ]);

            $this->dispatch(
                'toast',
                message: 'Заказ успешно оформлен!',
                type: 'success',
                title: 'Заказ принят',
            );
        } catch (\Throwable $th) {
            $this->dispatch(
                'toast',
                message: 'Произошла ошибка! Попробуйте ещё раз',
                type: 'error',
                title: 'Произошла ошибка',
            );
        }
    }
}
