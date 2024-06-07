<?php

namespace App\Livewire;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class OderPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Orders products')]

    public $search, $setSupplier;
    public function render()
    {
        if ($this->search) {
            $getOrderLog = DB::table('order_log')->where('status', '!=', 0)->where('id', 'like', '%' . $this->search . '%')->orderBy('updated_at', 'desc')->paginate(10);
        } else {
            // check if supplier is set or not
            if ($this->setSupplier != 0) {
                $getOrderLog = DB::table('order_log')->where('status', '!=', 0)->where('supplier', $this->setSupplier)->orderBy('updated_at', 'desc')->paginate(10);
            } else {
                $getOrderLog = DB::table('order_log')->where('status', '!=', 0)->orderBy('updated_at', 'desc')->paginate(10);
            }
        }
        $allSupplier = UserModel::where('role', 3)->get();
        // return veiw
        return view('livewire.oder-page', ['supplier' => $allSupplier, 'orderLog' => $getOrderLog]);
    }

    // Method to funnel search
    public function _funnel($name)
    {
        $this->setSupplier = $name;
        return redirect()->back();
    }

    // Method to delete user data
    public function confirmClick()
    {
        toastr()->success('ຍົກເລີກສຳເລັດແລ້ວ');
        $this->dispatch('success');
        return redirect()->back();
    }

}