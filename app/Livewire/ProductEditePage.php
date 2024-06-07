<?php

namespace App\Livewire;

use App\Models\Category as CategoryModel;
use App\Models\Product as ProductModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProductEditePage extends Component
{
    use WithFileUploads;
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Products')]

    // Method executed when the component is loaded
    public $setId, $name, $img, $price_order, $price_sale, $qty, $category_name, $description;
    public function mount($id)
    {
        // get product data by id
        $product = ProductModel::find($id);
        $this->name = $product->name;
        $this->img = $product->img;
        $this->price_order = $product->price_order;
        $this->price_sale = $product->price_sale;
        $this->qty = $product->qty;
        $this->category_name = $product->category_name;
        $this->description = $product->description;
        $this->setId = $product->id;
    }

    // Render view
    public function render()
    {
        $getAllCategories = CategoryModel::all();
        return view('livewire.product-edite-page', ['categories' => $getAllCategories]);
    }

    // Method to update product data
    public function _editeProduct()
    {
        // Validate the input fields
        $this->validate([
            'name' => 'required',
            'img' => 'required',
            'price_order' => 'required',
            'price_sale' => 'required',
            'qty' => 'required',
            'category_name' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'ປ້ອນຊື່ສິນຄ້າ.',
            'img.required' => 'ເລືອກຮູບສິນຄ້າ.',
            'price_order.required' => 'ປ້ອນລາຄາສິນຄ້າ.',
            'price_sale.required' => 'ປ້ອນລາຄາສິນຄ້າ.',
            'qty.required' => 'ປ້ອນຈຳນວນສິນຄ້າ.',
            'category_name.required' => 'ເລືອກປະເພດສິນຄ້າ.',
            'description.required' => 'ລາຍລະອຽດສິນຄ້າ.',
        ]);

        // Check if the user has selected a new image or old image
        if ($this->img instanceof \Illuminate\Http\UploadedFile) {
            // Upload image using Livewire
            $imageName = $this->img->store('images', 'public');
            $imageUrl = asset('storage/' . $imageName);
            //$imageUrl = asset('public/storage/' . $imageName);
        } else {
            // Use the old image URL
            $imageUrl = $this->img;
        }

        // Update data to database
        ProductModel::where('id', $this->setId)->update([
            'name' => $this->name,
            'img' => $imageUrl,
            'price_order' => $this->price_order,
            'price_sale' => $this->price_sale,
            'qty' => $this->qty,
            'category_name' => $this->category_name,
            'description' => $this->description,
            'updated_at' => now('Asia/Bangkok'),
        ]);

        // show a success sound
        $this->dispatch('success');

        // toast message
        toastr()->success('ບັນທຶກສຳເລັດແລ້ວ');

        // reset input
        $this->reset(
            'name',
            'img',
            'price_order',
            'price_sale',
            'qty',
            'category_name',
            'description'
        );

        // redirect to user page
        return $this->redirect('/products', navigate: true);
    }
}