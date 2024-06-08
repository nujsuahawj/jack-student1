<?php

namespace App\Livewire;

use App\Models\Category as CategoryModel;
use App\Models\Product as ProductModel;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SalePage extends Component
{
    #[Layout('layouts.pos')]
    #[Title('Admin Panel - Sale of points')]

    // Method executed when the component is loaded
    public function mount()
    {
        // check if has status = o in sale log table or not
        $checkSaleLog = DB::table('sale_log')->where('status', 0)->first();
        if ($checkSaleLog) {
            // reset sale log and sale log item
            DB::table('sale_log')->where('status', 0)->delete();
            DB::table('sale_log_item')->where('sale_log_id', $checkSaleLog->id)->delete();
        }

    }

    public $search, $category, $searchc, $setUName, $setUPhone, $setPayType;
    public function render()
    {
        // left column
        $saleLog = DB::table('sale_log')->where('status', 0)->first();
        if ($saleLog) {
            $totalQty = number_format($saleLog->total_qty);
            $totalPrice = number_format($saleLog->total_price);
            $allSaleLog = DB::table('sale_log_item')->where('sale_log_id', $saleLog->id)->get();
        } else {
            $totalQty = 0;
            $totalPrice = 0;
            $allSaleLog = [];
        }

        // right column
        $categories = CategoryModel::limit(12)->get();

        if ($this->search) {
            $products = ProductModel::where('qty', '>', 0)->where('name', 'like', '%' . $this->search . '%')->get();
        } else {
            // check if category is set or not
            if ($this->category != 0) {
                $products = ProductModel::where('qty', '>', 0)->where('category_name', $this->category)->get();
            } else {
                $products = ProductModel::where('qty', '>', 0)->get();
            }
        }

        if ($this->searchc) {
            $customer = UserModel::where('name', 'like', '%' . $this->searchc . '%')->limit(3)->get();
        } else {
            $customer = [];
        }

        // all productsShow
        $productsShow = ProductModel::all();

        return view('livewire.sale-page',
            [
                'products' => $products,
                'categories' => $categories,
                'customer' => $customer,
                'totalQty' => $totalQty,
                'totalPrice' => $totalPrice,
                'allSaleLog' => $allSaleLog,
                'productsShow' => $productsShow,
            ]);
    }

    // Method to funnel search
    public function _funnel($category)
    {
        $this->category = $category;
        return redirect()->back();
    }

    // Method to set user
    public function setU($name, $phone)
    {
        $this->setUName = $name;
        $this->setUPhone = $phone;

        // reset search
        $this->reset('searchc');
        return redirect()->back();
    }

    // method to new route
    public function newroute()
    {
        return $this->redirect('/', navigate: true);
    }
    public function newrouteU()
    {
        return $this->redirect('/users', navigate: true);
    }

    // Method to add sale log
    public function _addSaleLog($pId)
    {
        // check if has status = o in order log table or not
        $checkSaleLog = DB::table('sale_log')->where('status', 0)->first();
        if ($checkSaleLog) {
            // add new order log item
            $checkOrderLogItem = DB::table('sale_log_item')->where('sale_log_id', $checkSaleLog->id)->where('p_id', $pId)->first();
            if ($checkOrderLogItem) {
                // add qty
                DB::table('sale_log_item')->where('sale_log_id', $checkSaleLog->id)->where('p_id', $pId)->increment('p_qty', 1);
                // update total_qty in order log
                $totalQty = DB::table('sale_log_item')->where('sale_log_id', $checkSaleLog->id)->sum('p_qty');
                DB::table('sale_log')->where('id', $checkSaleLog->id)->update([
                    'total_qty' => $totalQty + 1,
                ]);

                // toast sound
                $this->dispatch('success');
                // toast message
                toastr()->success('ເພີ່ມລາຍການສິນຄ້າສຳເລັດ');
            } else {
                // create new sale log item
                DB::table('sale_log_item')->insert([
                    'sale_log_id' => $checkSaleLog->id,
                    'p_id' => $pId,
                    'p_qty' => 1,
                    'created_at' => now('Asia/Vientiane'),
                    'updated_at' => now('Asia/Vientiane'),
                ]);

                // update total_qty in sale log
                $totalQty = DB::table('sale_log_item')->where('sale_log_id', $checkSaleLog->id)->sum('p_qty');
                DB::table('sale_log')->where('id', $checkSaleLog->id)->update([
                    // total_qty = old total_qty + new total_qty
                    'total_qty' => $totalQty,
                ]);

                // update total_price in sale log
                $getProductPrice = ProductModel::where('id', $pId)->first();
                $totalPrice = $getProductPrice->price_sale * $totalQty;
                DB::table('sale_log')->where('id', $checkSaleLog->id)->update([
                    // total_price = old total_price + new total_price
                    'total_price' => $totalPrice,
                ]);

                // toast sound
                $this->dispatch('success');

                // toast message
                toastr()->success('ເພີ່ມລາຍການສິນຄ້າສຳເລັດ');
            }
        } else {
            // create new order log
            $aleLogId = DB::table('sale_log')->insertGetId([
                'id' => rand(100000, 999999),
                'created_by' => auth()->user()->name,
                'customer_name' => null,
                'customer_phone' => null,
                'status' => 0,
                'total_qty' => 0, // default 0
                'total_price' => 0, // default 0
                'payment' => null,
                'created_at' => now('Asia/Vientiane'),
                'updated_at' => now('Asia/Vientiane'),
            ]);

            // create new order log item
            DB::table('sale_log_item')->insert([
                'sale_log_id' => $aleLogId,
                'p_id' => $pId,
                'p_qty' => 1,
                'created_at' => now('Asia/Vientiane'),
                'updated_at' => now('Asia/Vientiane'),
            ]);

            // update total_qty in order log
            $totalQty = DB::table('sale_log_item')->where('sale_log_id', $aleLogId)->sum('p_qty');
            DB::table('sale_log')->where('id', $aleLogId)->update([
                'total_qty' => $totalQty,
            ]);

            // update total_price in order log
            $getProductPrice = ProductModel::where('id', $pId)->first();
            $totalPrice = $getProductPrice->price_order * $totalQty;
            DB::table('sale_log')->where('id', $aleLogId)->update([
                'total_price' => $totalPrice,
            ]);

            // toast sound
            $this->dispatch('success');

            // toast message
            toastr()->success('ເພີ່ມລາຍການສິນຄ້າສຳເລັດ');
        }

        // return back
        return redirect()->back();
    }

    // Method to remove sale log
    public function _removeSaleLog($pId)
    {
        // get sale log id by status = 0
        $saleLog = DB::table('sale_log')->where('status', 0)->first();
        // delete sale log item by p_id and sale log id
        DB::table('sale_log_item')->where('p_id', $pId)->where('sale_log_id', $saleLog->id)->delete();
        // update total_qty in sale log
        $totalQty = DB::table('sale_log_item')->where('sale_log_id', $saleLog->id)->sum('p_qty');
        DB::table('sale_log')->where('id', $saleLog->id)->update([
            'total_qty' => $totalQty,
        ]);
        // update total_price in sale log
        $getProductPrice = ProductModel::where('id', $pId)->first();
        $totalPrice = $getProductPrice->price_sale * $totalQty;
        DB::table('sale_log')->where('id', $saleLog->id)->update([
            'total_price' => $totalPrice,
        ]);

        // toast sound
        $this->dispatch('success');

        // toast message
        toastr()->success('ລຶບລາຍການສິນຄ້າສຳເລັດ');
        // return back
        return redirect()->back();
    }

    // Method to cancel sale log
    public function _cancelSale()
    {
        // get sale log by status = 0
        $saleLog = DB::table('sale_log')->where('status', 0)->first();
        // get all sale log item by sale log id
        $allSaleLog = DB::table('sale_log_item')->where('sale_log_id', $saleLog->id)->get();

        // delete all sale log item by sale log id
        DB::table('sale_log_item')->where('sale_log_id', $saleLog->id)->delete();
        // delete sale log by sale log id
        DB::table('sale_log')->where('id', $saleLog->id)->delete();

        // toast sound
        $this->dispatch('success');

        // toast message
        toastr()->success('ຍົກເລີກການຂາຍສິນຄ້າສຳເລັດ');

        // return back
        return redirect()->back();
    }

    // Method to save sale log
    public function _saveSaleLog()
    {
        // check customer name and phone has set or not, and then check payment type has set or not
        if ($this->setUName && $this->setUPhone && $this->setPayType) {
            // get sale log by status = 0
            $saleLog = DB::table('sale_log')->where('status', 0)->first();
            // update sale log by sale log id
            DB::table('sale_log')->where('id', $saleLog->id)->update([
                'customer_name' => $this->setUName,
                'customer_phone' => $this->setUPhone,
                'status' => 1,
                'payment' => $this->setPayType,
            ]);

            // toast sound
            $this->dispatch('success');

            // toast message
            toastr()->success('ບັນທຶກການຂາຍສິນຄ້າສຳເລັດ');

            // return back
            return $this->redirect('/sales', navigate: true);
        } else {
            // toast sound
            $this->dispatch('error');

            // toast message
            toastr()->error('ກະລຸນາກວດສອບຂໍ້ມູນທີ່ປ້ອນຖືກຕ້ອງ');

            // return back
            return redirect()->back();
        }
    }
}
