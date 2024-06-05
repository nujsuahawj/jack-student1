<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class OderPage extends Component
{
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Orders products')]

    public $dataList = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    public function render()
    {
        return view('livewire.oder-page');
    }
}