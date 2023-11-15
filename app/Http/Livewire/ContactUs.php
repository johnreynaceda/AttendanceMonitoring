<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class ContactUs extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $fullname, $email, $contact, $message;
    protected function getFormSchema(): array
    {
        return [
            TextInput::make('fullname')->required(),
            TextInput::make('email')->label('Email Address')->email()->required(),
            TextInput::make('contact')->label('Contact Number')->numeric()->required(),
            Textarea::make('message')->required(),

        ];
    }

    public function render()
    {
        return view('livewire.contact-us');
    }

    public function submit()
    {
        $this->validate([
            'fullname' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'message' => 'required',
        ]);
        Message::create([
            'fullname' => $this->fullname,
            'email' => $this->email,
            'contact' => $this->contact,
            'message' => $this->message
        ]);
        sweetalert()->addSuccess('Message sent successfully');
        return redirect()->route('welcome');


    }
}