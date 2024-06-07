<?php

namespace App\Livewire;

use App\Models\Category as CategoryModel;
use App\Models\Product as ProductModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Products')]

    public $search, $category;
    public function render()
    {
        if ($this->search) {
            $productList = ProductModel::where('name', 'like', '%' . $this->search . '%')->orderBy('updated_at', 'desc')->paginate(10);
        } else {
            // check if category is set or not
            if ($this->category != 0) {
                $productList = ProductModel::where('category_name', $this->category)->orderBy('updated_at', 'desc')->paginate(10);
            } else {
                $productList = ProductModel::orderBy('updated_at', 'desc')->paginate(10);
            }
        }
        $getAllCategory = CategoryModel::all();

        return view('livewire.product-page', ['productList' => $productList, 'getAllCategory' => $getAllCategory]);
    }

    // Method to funnel search
    public function _funnel($category)
    {
        $this->category = $category;
        return redirect()->back();
    }

    // Method to delete user data
    public function confirmClick()
    {
        toastr()->success('ລົບຂໍ້ມູນສຳເລັດແລ້ວ');
        $this->dispatch('success');
        return redirect()->back();
    }
}