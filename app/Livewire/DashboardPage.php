<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class DashboardPage extends Component
{
    #[Layout('layouts.guest')]
    #[Title('Jack - Dashboard')]

    public function render()
    {
        return view('livewire.dashboard-page');
    }
}