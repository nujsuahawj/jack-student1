<?php

namespace App\Livewire;

use App\Models\Category as CategoryModel;
use App\Models\Product as ProductModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProductCreatePage extends Component
{
    use WithFileUploads;
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Products')]

    public function render()
    {
        $getAllCategories = CategoryModel::all();
        return view('livewire.product-create-page', ['categories' => $getAllCategories]);
    }

    // Method to create a new product
    public $name, $img, $price, $qty, $category_name, $description;
    public function _createProduct()
    {
        // Validate the input fields
        $this->validate([
            'name' => 'required',
            'img' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'category_name' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'ປ້ອນຊື່ສິນຄ້າ.',
            'img.required' => 'ເລືອກຮູບສິນຄ້າ.',
            'price.required' => 'ປ້ອນລາຄາສິນຄ້າ.',
            'qty.required' => 'ປ້ອນຈຳນວນສິນຄ້າ.',
            'category_name.required' => 'ເລືອກປະເພດສິນຄ້າ.',
            'description.required' => 'ລາຍລະອຽດສິນຄ້າ.',
        ]);

        // Upload image using Livewire
        $imageName = $this->img->store('images', 'public');
        $imageUrl = asset('storage/' . $imageName);
        //$imageUrl = asset('public/storage/' . $imageName);

        // Save data to database
        $data = new ProductModel();
        $data->id = rand(100000, 999900); // random number (6 digits)
        $data->name = $this->name;
        $data->img = $imageUrl;
        $data->price = $this->price;
        $data->qty = $this->qty;
        $data->category_name = $this->category_name;
        $data->description = $this->description;
        $data->created_at = now('Asia/Vientiane');
        $data->updated_at = now('Asia/Vientiane');
        $data->save();

        // show a success sound
        $this->dispatch('success');

        // toast message
        toastr()->success('ບັນທຶກສຳເລັດແລ້ວ');

        // reset input
        $this->reset(
            'name',
            'img',
            'price',
            'qty',
            'category_name',
            'description'
        );

        // redirect to user page
        return $this->redirect('/products', navigate: true);
    }
}