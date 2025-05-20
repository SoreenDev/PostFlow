<?php

namespace App\Livewire\Auth;

use App\Http\Requests\Auth\AuthRegisterRequest;
use Livewire\Component;

class Register extends Component
{
    public string $user_name;
    public string $email;
    public string $password;
    public string $password_confirmation;

    protected function validateRequest(string $requestClass)
    {
        $request = new $requestClass();
        return $this->validate($request->rules(), $request->messages());
    }
    public function register()
    {
        $validated = $this->validateRequest(AuthRegisterRequest::class);
    }


    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layout.auth_layout', ['title' => 'Register']);

    }
}
