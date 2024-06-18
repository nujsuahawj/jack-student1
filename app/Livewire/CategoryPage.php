<?php

namespace App\Livewire;

use App\Models\Category as ModelsCategory;
use App\Models\Product as ModelProduct;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Categories')]

    public $search;
    public function render()
    {
        if ($this->search != '') {
            $categoryList = ModelsCategory::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(15);
        } else {
            $categoryList = ModelsCategory::orderBy('id', 'desc')->paginate(15);
        }
        $allProducts = ModelProduct::all();
        return view('livewire.category-page', [
            'categoryList' => $categoryList,
            'allProducts' => $allProducts,
        ]);
    }

    // Method to add a new category
    public $category, $category_id;
    public function _addCategory()
    {
        // check if the category id is set or not
        if ($this->category_id) {
            // save the category to the database
            $category = ModelsCategory::find($this->category_id);
            $category->name = $this->category;
            $category->updated_at = now('Asia/Vientiane');
            $category->save();

            // reset the category input
            $this->category = '';

            // show a success sound
            $this->dispatch('success');

            // show a success message
            toastr()->success('ປ່ຽນຊື່ປະເພດສຳເລັດແລ້ວ');
        } else {
            // validate the category
            $this->validate([
                'category' => 'required',
            ], [
                'category.required' => 'ກະລຸນາປ້ອນຊື່ປະເພດກ່ອນ',
            ]);

            // save the category to the database
            $category = new ModelsCategory();
            $category->name = $this->category;
            $category->created_at = now('Asia/Vientiane');
            $category->updated_at = now('Asia/Vientiane');
            $category->save();

            // reset the category input
            $this->category = '';

            // show a success sound
            $this->dispatch('success');

            // show a success message
            toastr()->success('ເພີ່ມລາຍການສຳເລັດແລ້ວ');

        }
        // return back to the same page
        return redirect()->back();

    }

    // Method to edite a category
    public function _editeCategory($id)
    {
        $category = ModelsCategory::find($id);
        $this->category = $category->name;

        // set the category id
        $this->category_id = $category->id;

        // reset search input
        $this->reset('search');

        // return back to the same page
        return redirect()->back();
    }

    // Method to delete category data
    public function confirmClick($id)
    {
        // check if status =1 set to 0 if status = 0 set to 1
        $category = ModelsCategory::find($id);
        if ($category->status == 1) {
            $category->status = 0;
        } else {
            $category->status = 1;
        }
        $category->save();

        // set all products to inactive by category id
        $products = ModelProduct::where('category_name', $category->name)->get();
        foreach ($products as $product) {
            if ($category->status == 1) {
                $product->status = 0;
            } else {
                $product->status = 1;
            }
            $product->save();
        }

        toastr()->success('ລົບຂໍ້ມູນສຳເລັດແລ້ວ');
        $this->dispatch('success');
        return redirect()->back();
    }
}
