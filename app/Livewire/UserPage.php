<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class UserPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Users management')]

    public $search, $rolse;
    public function render()
    {
        if ($this->search) {
            $userDataList = ModelsUser::where('name', 'like', '%' . $this->search . '%')->whereIn('role', [1, 2])->orderBy('id', 'desc')->paginate(10);
        } else {
            // check if role is set or not
            if ($this->rolse != 0) {
                $userDataList = ModelsUser::where('role', $this->rolse)->orderBy('id', 'desc')->paginate(10);
            } else {
                $userDataList = ModelsUser::whereIn('role', [1, 2])
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            }
        }
        return view('livewire.user-page',
            [
                'userDataList' => $userDataList,
            ]);
    }

    // Method to funnel search
    public function _funnel($rolse)
    {
        $this->rolse = $rolse;
        return redirect()->back();
    }

    // Method to delete user data
    public function confirmClick($id)
    {
        // check id and delete user data set status to 0
        $userData = ModelsUser::find($id);
        $userData->status = 0;
        $userData->save();
        toastr()->success('ລົບຂໍ້ມູນສຳເລັດແລ້ວ');
        $this->dispatch('success');
        return redirect()->back();
    }

}