<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Telegram\Bot\Api;

class ContactForm extends Component
{
    #[Rule([
        'required',
        'string',
        'min:3',
        'max:255',
    ])]
    public string $firstName = '';

    #[Rule([
        'nullable',
        'min:3',
        'max:255',
    ])]
    public string $lastName = '';

    #[Rule([
        'nullable',
        'digits_between:10,15',
    ])]
    public string $phone = '';

    #[Rule([
        'required',
        'email',
        'max:255',
    ])]
    public string $email = '';

    #[Rule([
        'required',
        'string',
        'min:10',
        'max:1000',
    ])]
    public string $message = '';

    #[Rule([
        'required',
        'in:Product Information,Shipping and Delivery,Return and Refund,Technical Issue,Other',
    ])]
    public $subject;

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function send()
    {
        $this->validate();

        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        $message = 'Новое сообщение!
Имя - '.$this->firstName.'
';

        if ($this->lastName) {
            $message .= 'Фамилия - '.$this->lastName.'
';
        }

        if ($this->phone) {
            $message .= 'Телефон - '.$this->phone.'
';
        }

        $message .= 'Email - '.$this->email.'
Тема - '.$this->subject.'
Текст сообщения - "'.$this->message.'"';

        try {
            $telegram->sendMessage([
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'text' => $message,
            ]);

            $this->dispatch(
                'toast',
                message: 'Ваше сообщение успешно отправлено.',
                type: 'success',
                title: 'Сообщение отправлено',
            );

            $this->reset();
        } catch (\Throwable $th) {
            $this->dispatch(
                'toast',
                message: 'При отправке сообщения произошла ошибка.',
                type: 'error',
                title: 'Сообщение не отправлено',
            );
        }
    }
}
