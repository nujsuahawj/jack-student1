<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class LoginPage extends Component
{
    #[Layout('layouts.login')]
    #[Title('Jack - Login')]

    public function render()
    {
        return view('livewire.login-page');
    }
}