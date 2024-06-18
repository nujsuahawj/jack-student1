<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CustomerCreatePage extends Component
{
    use WithFileUploads;
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Customer management')]

    public $userId, $roleId, $addPassword;
    public function mount()
    {
        $this->roleId = 4;
    }

    public function render()
    {
        return view('livewire.customer-create-page');
    }
    // Method to set role before show form
    public function _setRole($role)
    {
        $this->roleId = $role;
        if ($role == 3 || $role == 4) {
            $this->addPassword = 'password';
        }
        return redirect()->back();
    }

    // Method to add new user
    public $addName, $addPhone, $Addavatar, $addVillage, $addDistrict, $addCity;
    public function _createUserData()
    {
        $this->validate([
            'addName' => 'required',
            'addPhone' => 'required',
            'addPassword' => 'required',
            'roleId' => 'required',
            'Addavatar' => 'required',
            'addVillage' => 'required',
            'addDistrict' => 'required',
            'addCity' => 'required',
        ], [
            'addName.required' => 'ປ້ອນຊື່',
            'addPhone.required' => 'ປ້ອນເບີໂທ',
            'addPassword.required' => 'ປ້ອນລະຫັດຜ່ານ',
            'roleId.required' => 'ເລືອກສິດທິຜູ້ໃຊ້',
            'Addavatar.required' => 'ເລືອກຮູບພາບ',
            'addVillage.required' => 'ປ້ອນບ້ານ',
            'addDistrict.required' => 'ປ້ອນເມືອງ',
            'addCity.required' => 'ປ້ອນແຂວງ',
        ]);

        // Upload image using Livewire
        $imageName = $this->Addavatar->store('images', 'public');
        $imageUrl = asset('storage/' . $imageName);
        //$imageUrl = asset('public/storage/' . $imageName);

        // Save data to database
        $data = new ModelsUser();
        $data->name = $this->addName;
        $data->phone = $this->addPhone;
        $data->password = bcrypt($this->addPassword);
        $data->role = $this->roleId;
        $data->avatar = $imageUrl;
        $data->village = $this->addVillage;
        $data->district = $this->addDistrict;
        $data->city = $this->addCity;
        $data->save();

        // show a success sound
        $this->dispatch('success');

        // toast message
        toastr()->success('ບັນທຶກສຳເລັດແລ້ວ');

        // reset input
        $this->reset(
            'addName',
            'addPhone',
            'addPassword',
            'roleId',
            'Addavatar'
        );

        // redirect to user page
        return $this->redirect('/customers', navigate: true);
    }
}