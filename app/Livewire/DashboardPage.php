<?php

namespace App\Livewire;

use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class DashboardPage extends Component
{
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Dashboard')]

    public function render()
    {
        $saleItems = DB::table('sale_log')->sum('total_qty');
        $orderItems = DB::table('order_log')->sum('total_qty');
        $saleMoneyToday = DB::table('sale_log')->whereDate('created_at', date('Y-m-d'))->sum('total_price');
        $saleMoneyLastDay = DB::table('sale_log')->whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->sum('total_price');
        $allSaleMoney = DB::table('sale_log')->sum('total_price');

        $allProduct = ProductModel::all();
        $bestProductSale = DB::table('sale_log_item')
            ->select('p_id', DB::raw('SUM(p_qty) as total_qty'))
            ->groupBy('p_id')
            ->orderBy('total_qty', 'desc')
            ->limit(10)
            ->get();
        $stockProductSale = ProductModel::where('qty', '<', 2)
            ->orderBy('qty', 'asc')
            ->limit(10)
            ->get();

        // return view
        return view('livewire.dashboard-page',
            [
                'saleItems' => $saleItems,
                'orderItems' => $orderItems,
                'saleMoneyToday' => $saleMoneyToday,
                'saleMoneyLastDay' => $saleMoneyLastDay,
                'allSaleMoney' => $allSaleMoney,
                'allProduct' => $allProduct,
                'bestProductSale' => $bestProductSale,
                'stockProductSale' => $stockProductSale,
            ]);
    }
}