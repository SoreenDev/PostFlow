<?php

namespace App\Livewire\Auth;

use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Traits\LivewireValidationHandler;
use Livewire\Component;

class Register extends Component
{
    use LivewireValidationHandler;

    public array $liveValidationRules ;
    public string $user_name;
    public string $email;
    public string $password;
    public string $password_confirmation;

    public function mount()
    {
        $this->setupValidation(AuthRegisterRequest::class);
        $this->liveValidationRules = $this->validRules;
        $this->liveValidationRules['password_confirmation'] = 'required|min:8|max:255|confirmation:password';
    }
    public function register()
    {
        $validated = $this->validate(...$this->ruleAndMessage);
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
