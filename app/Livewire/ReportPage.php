<?php

namespace App\Livewire;

use App\Models\User as UserModels;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ReportPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Reports Data')]

    public $setTypeReport = null,$searchSale, $searchOrder, $searchProduct;
    public function render()
    {
        $allUser = UserModels::all();
        if($this->searchSale){
            $salse = DB::table('sale_log')->where('status', 1)->where('created_at', 'like', '%'.$this->searchSale.'%')->orWhere('id', 'like', '%'.$this->searchSale.'%')->paginate(50);
        }else{
            $salse = DB::table('sale_log')->where('status', 1)->paginate(50);
        }

        if($this->searchOrder){
            $orders = DB::table('order_log')->where('status', '!=',0)->where('created_at', 'like', '%'.$this->searchOrder.'%')->orWhere('id', 'like', '%'.$this->searchOrder.'%')->paginate(50);
        }else{
            $orders = DB::table('order_log')->where('status', '!=',0)->paginate(50);
        }

        if($this->searchProduct){
            $products = DB::table('products')->where('created_at', 'like', '%'.$this->searchProduct.'%')->orWhere('id', 'like', '%'.$this->searchProduct.'%')->paginate(50);
        }else{
            $products = DB::table('products')->paginate(50);
        }

        // return
        return view('livewire.report-page',
            [
                'users' => $allUser,
                'salse' => $salse,
                'orders' => $orders,
                'products' => $products
            ]);
    }
}