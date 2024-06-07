<?php

namespace App\Livewire;

use App\Models\Product as ProductModel;
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

    public $search;
    public function render()
    {
        if ($this->search) {
            $dataList = ProductModel::where('name', 'like', '%' . $this->search . '%')->orderBy('updated_at', 'desc')->paginate(15);
        } else {
            $dataList = ProductModel::orderBy('updated_at', 'desc')->paginate(15);
        }

        // return veiw
        return view('livewire.oder-page', [
            'dataList' => $dataList,
        ]);
    }
}