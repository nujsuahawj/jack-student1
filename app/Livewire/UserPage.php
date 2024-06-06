<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserPage extends Component
{
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Users management')]

    public $dataList = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
    public function render()
    {
        return view('livewire.user-page');
    }

    // Method to set role before show form
    public $roleId;
    public function _setRole($role)
    {
        $this->roleId = $role;
    }
}