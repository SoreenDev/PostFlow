<?php

namespace App\Livewire\Dashboard;

use Illuminate\View\View;
use Livewire\Component;

class Panel extends Component
{

    public function render(): View
    {
        return view('livewire.dashboard.panel')
            ->layout('layout.dashboard_layout', ['title' => 'Dashboard']);
    }
}
