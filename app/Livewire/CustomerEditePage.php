<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CustomerEditePage extends Component
{
    use WithFileUploads;
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Customer management')]

    // Method executed when the component is loaded

    public $userId, $roleId, $addPassword;
    public $addName, $addPhone, $Addavatar, $addVillage, $addDistrict, $addCity, $SetStatus;
    public function mount($id)
    {
        // get user data by id
        $user = ModelsUser::find($id);
        $this->userId = $id;
        $this->addName = $user->name;
        $this->addPhone = $user->phone;
        $this->addPassword = $user->password;
        $this->roleId = $user->role;
        $this->Addavatar = $user->avatar;
        $this->addVillage = $user->village;
        $this->addDistrict = $user->district;
        $this->addCity = $user->city;
        $this->SetStatus = $user->status;
    }

    // Render view
    public function render()
    {
        return view('livewire.customer-edite-page');
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

    // Method to update user data
    public function _updateUserData()
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

        // Check if the user has selected a new image or old image
        if ($this->Addavatar instanceof \Illuminate\Http\UploadedFile) {
            // Upload image using Livewire
            $imageName = $this->Addavatar->store('images', 'public');
            $imageUrl = asset('storage/' . $imageName);
            //$imageUrl = asset('public/storage/' . $imageName);
        } else {
            // Use the old image URL
            $imageUrl = $this->Addavatar;
        }

        // Update data to database
        $data = ModelsUser::find($this->userId);
        $data->name = $this->addName;
        $data->phone = $this->addPhone;
        $data->password = bcrypt($this->addPassword);
        $data->role = $this->roleId;
        $data->avatar = $imageUrl;
        $data->village = $this->addVillage;
        $data->district = $this->addDistrict;
        $data->city = $this->addCity;
        $data->status = $this->SetStatus;
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