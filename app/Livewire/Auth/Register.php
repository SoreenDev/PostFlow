<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Register extends Component
{
    public string $user_name;
    public string $email;
    public string $password;
    public string $password_confirmation;

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layout.auth_layout', ['title' => 'Register']);

    }
}
