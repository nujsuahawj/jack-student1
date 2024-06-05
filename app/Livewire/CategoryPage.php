<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CategoryPage extends Component
{
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Categories')]

    public $dataList = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    public function render()
    {
        return view('livewire.category-page');
    }
}