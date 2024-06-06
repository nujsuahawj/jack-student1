<?php

namespace App\Livewire;

use App\Models\User as ModelLogin;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class LoginPage extends Component
{
    #[Layout('layouts.login')]
    #[Title('Admin Panel - Login')]

    // Method executed when the component is loaded

    public function mount()
    {
        // If the user is already authenticated, redirect to the logout route
        if (Auth::check()) {
            return redirect()->route('logout');
        }
    }

    // Render the login component
    public function render()
    {
        return view('livewire.login-page');
    }

    // method to handle login
    public $phone, $password;

    public function _checkLoginAdmin()
    {
        // Validate phone number and password
        $this->validate([
            'phone' => 'required|numeric|digits:11',
            'password' => 'required|min:6',
        ]);

        // Check if user exists with given phone number, role = 1, and status = 1
        $user = ModelLogin::where('phone', $this->phone)->first();

        if ($user) {
            if (Auth::attempt(['phone' => $this->phone, 'password' => $this->password])) {
                // Redirect to admin dashboard upon successful authentication
                return redirect()->route('dashboard');
            } else {
                // Display error message if password is incorrect
                toastr()->error('ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ');
            }
            // Redirect back to login page
            return redirect()->back();
        } else {
            // Display error message if phone number is not found
            toastr()->error('ເບີໂທລະສັບບໍ່ຖືກຕ້ອງ');
            return redirect()->back();
        }
    }
}