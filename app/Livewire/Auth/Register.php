<?php

namespace App\Livewire\Auth;

use App\Http\Requests\Auth\AuthRegisterRequest;
use Livewire\Component;

class Register extends Component
{
    public array $front_validation = [
        'user_name' => 'required|min:4|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|min:8|max:255:',
        'password_confirmation' => 'required|min:8|max:255|confirmation:password'
    ];
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
        dd($validated);
    }


    public function render()
    {
        if ($this->getErrorBag()->any()) {
          $this->dispatch('has_errors', $this->getErrorBag()->toArray());
        }
        return view('livewire.auth.register')
            ->layout('layout.auth_layout', ['title' => 'Register']);

    }
}
