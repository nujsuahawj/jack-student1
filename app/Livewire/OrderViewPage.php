<?php

namespace App\Livewire;

use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class OrderViewPage extends Component
{

    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Orders products')]

    public $setId;
    public function mount($id)
    {
        $this->setId = $id;
    }

    // Method executed when the component is loaded
    public function render()
    {
        $allOrderLog = DB::table('order_log_item')->where('order_log_id', $this->setId)->get();
        $showProductPrice = ProductModel::all();
        $totalQty = number_format(DB::table('order_log')->where('id', $this->setId)->first()->total_qty);
        $totalPrice = number_format(DB::table('order_log')->where('id', $this->setId)->first()->total_price);
        $supplier = DB::table('order_log')->where('id', $this->setId)->first()->supplier;
        $created_by = DB::table('order_log')->where('id', $this->setId)->first()->created_by;
        $createAt = DB::table('order_log')->where('id', $this->setId)->first()->created_at;
        $updateAt = DB::table('order_log')->where('id', $this->setId)->first()->updated_at;

        return view('livewire.order-view-page',
            [
                'orderLog' => $allOrderLog,
                'showProductPrice' => $showProductPrice,
                'totalQty' => $totalQty,
                'totalPrice' => $totalPrice,
                'supplier' => $supplier,
                'created_by' => $created_by,
                'createAt' => $createAt,
                'updateAt' => $updateAt,
            ]);
    }
}
