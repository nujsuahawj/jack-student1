<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function data($id)
    {
        // get data from table sale_log
        $saleLog = DB::table('sale_log')->where('id', $id)->first();
        // get data from table sale_item
        $saleItems = DB::table('sale_log_item')
            ->join('products', 'sale_log_item.p_id', '=', 'products.id')
            ->select('products.name as name', 'sale_log_item.p_qty as quantity', 'products.price_sale as price')
            ->where('sale_log_item.sale_log_id', $id)
            ->get();
        // get data from table customer
        $customer = DB::table('users')->where('phone', $saleLog->customer_phone)->first();
        // Format total_price with commas and 2 decimal places
        $totalFormatted = number_format($saleLog->total_price, 2);

        // Format price in each sale item with commas and 2 decimal places
        foreach ($saleItems as $item) {
            $item->price = number_format((int)$item->price, 2);
        }
        $data = [
            'billNo' => $saleLog->id,
            'cmAddress' => $customer->village . ', ' . $customer->district . ', ' . $customer->city,
            'cmPhone' => $customer->phone,
            'cmName' => $customer->name,
            'saleItem' => $saleItems,
            'total' => $totalFormatted,
        ];

        return response()->json($data);
    }
}