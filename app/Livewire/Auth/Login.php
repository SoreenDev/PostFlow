<?php

namespace App\Livewire\Auth;

use App\Http\Requests\Auth\AuthLoginRequest;
use App\Traits\LivewireValidationHandler;
use Livewire\Component;

class Login extends Component
{
    use LivewireValidationHandler;
    public array $liveValidationRules;
    public string $email;
    public string $password;

    public function mount($name = 'Default Name')
    {
        $this->setupValidation(AuthLoginRequest::class);
        $this->liveValidationRules = $this->validRules;
    }

    public function login()
    {
            $validated = $this->validate(...$this->massageAndRoles);
        dd($validated);
    }

    public function render()
    {
        if ($this->getErrorBag()->any()) {
            $this->dispatch('has_errors', $this->getErrorBag()->toArray());
        }
        return view('livewire.auth.login')
            ->layout('layout.auth_layout', ['title' => 'Login']);
    }
}
