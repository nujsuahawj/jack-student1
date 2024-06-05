<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SalePage extends Component
{
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Sale of points')]

    public function render()
    {
        return view('livewire.sale-page');
    }
}