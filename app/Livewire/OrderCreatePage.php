<?php

namespace App\Livewire;

use App\Models\Product as ProductModel;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class OrderCreatePage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    #[Layout('layouts.guest')]
    #[Title('Admin Panel - Orders products')]

    // Method executed when the component is loaded
    public function mount()
    {
        // check if has status = o in order log table or not
        $checkOrderLog = DB::table('order_log')->where('status', 0)->first();
        if ($checkOrderLog) {
            // reset order log and order log item
            DB::table('order_log')->where('status', 0)->delete();
            DB::table('order_log_item')->where('order_log_id', $checkOrderLog->id)->delete();
        }

    }

    public $search;
    public function render()
    {
        if ($this->search) {
            $dataList = ProductModel::where('name', 'like', '%' . $this->search . '%')->orderBy('updated_at', 'desc')->paginate(10);
        } else {
            $dataList = ProductModel::orderBy('updated_at', 'desc')->paginate(10);
        }

        $allSupplier = UserModel::where('role', 3)->get();

        $orderLogFirst = DB::table('order_log')->where('status', 0)->first();
        if ($orderLogFirst) {
            $totalQty = number_format($orderLogFirst->total_qty);
            $totalPrice = number_format($orderLogFirst->total_price);
            $allOrderLog = DB::table('order_log_item')->where('order_log_id', $orderLogFirst->id)->get();
        } else {
            $totalQty = 0;
            $totalPrice = 0;
            $allOrderLog = [];
        }

        $showProductPrice = ProductModel::all();
        return view('livewire.order-create-page',
            [
                'dataList' => $dataList,
                'supplier' => $allSupplier,
                'totalQty' => $totalQty,
                'totalPrice' => $totalPrice,
                'allOrderLog' => $allOrderLog,
                'showProductPrice' => $showProductPrice,
            ]);
    }

    // Method add order log
    public function _addOrderLog($pId)
    {
        // check if has status = o in order log table or not
        $checkOrderLog = DB::table('order_log')->where('status', 0)->first();
        if ($checkOrderLog) {
            // add new order log item
            $checkOrderLogItem = DB::table('order_log_item')->where('order_log_id', $checkOrderLog->id)->where('p_id', $pId)->first();
            if ($checkOrderLogItem) {
                // toast message error
                toastr()->error('ລາຍການສິນຄ້າຖືກເພີ່ມແລ້ວ');
                $this->dispatch('error');
            } else {
                // create new order log item
                DB::table('order_log_item')->insert([
                    'order_log_id' => $checkOrderLog->id,
                    'p_id' => $pId,
                    'p_qty' => 1,
                    'created_at' => now('Asia/Vientiane'),
                    'updated_at' => now('Asia/Vientiane'),
                ]);

                // update total_qty in order log
                $totalQty = DB::table('order_log_item')->where('order_log_id', $checkOrderLog->id)->sum('p_qty');
                DB::table('order_log')->where('id', $checkOrderLog->id)->update([
                    'total_qty' => $totalQty,
                ]);

                // update total_price in order log
                $getProductPrice = ProductModel::where('id', $pId)->first();
                $totalPrice = $getProductPrice->price_order * $totalQty;
                DB::table('order_log')->where('id', $checkOrderLog->id)->update([
                    'total_price' => $totalPrice + $checkOrderLog->total_price,
                ]);

                // toast sound
                $this->dispatch('success');

                // toast message
                toastr()->success('ເພີ່ມລາຍການສິນຄ້າສຳເລັດ');
            }
        } else {
            // create new order log
            $orderLogId = DB::table('order_log')->insertGetId([
                'id' => rand(100000, 999999),
                'supplier' => null,
                'created_by' => auth()->user()->name,
                'status' => 0,
                'total_qty' => 0, // default 0
                'total_price' => 0, // default 0
                'created_at' => now('Asia/Vientiane'),
                'updated_at' => now('Asia/Vientiane'),
            ]);

            // create new order log item
            DB::table('order_log_item')->insert([
                'order_log_id' => $orderLogId,
                'p_id' => $pId,
                'p_qty' => 1,
                'created_at' => now('Asia/Vientiane'),
                'updated_at' => now('Asia/Vientiane'),
            ]);

            // update total_qty in order log
            $totalQty = DB::table('order_log_item')->where('order_log_id', $orderLogId)->sum('p_qty');
            DB::table('order_log')->where('id', $orderLogId)->update([
                'total_qty' => $totalQty,
            ]);

            // update total_price in order log
            $getProductPrice = ProductModel::where('id', $pId)->first();
            $totalPrice = $getProductPrice->price_order * $totalQty;
            DB::table('order_log')->where('id', $orderLogId)->update([
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

    // Method plus qty or minus qty
    public function _plusMinus($status, $pId)
    {
        // get order log item
        $orderLogItem = DB::table('order_log_item')->where('p_id', $pId)->first();
        // check status
        if ($status == 1) {
            // plus qty
            DB::table('order_log_item')->where('p_id', $pId)->update([
                'p_qty' => $orderLogItem->p_qty + 1,
                'updated_at' => now('Asia/Vientiane'),
            ]);
        } else {
            // minus qty
            DB::table('order_log_item')->where('p_id', $pId)->update([
                'p_qty' => $orderLogItem->p_qty - 1,
                'updated_at' => now('Asia/Vientiane'),
            ]);
        }

        // update total_qty in order log
        $totalQty = DB::table('order_log_item')->where('order_log_id', $orderLogItem->order_log_id)->sum('p_qty');
        DB::table('order_log')->where('id', $orderLogItem->order_log_id)->update([
            'total_qty' => $totalQty + 1,
        ]);

        // update total_price in order log
        $getProductPrice = ProductModel::where('id', $pId)->first();
        $totalPrice = $getProductPrice->price_order * $totalQty;
        DB::table('order_log')->where('id', $orderLogItem->order_log_id)->update([
            'total_price' => $totalPrice,
        ]);

        // return back
        return redirect()->back();
    }

    // Method remove order log item
    public function _removeProduct($pId)
    {
        // remove order log item by p_id
        DB::table('order_log_item')->where('p_id', $pId)->delete();

        // update total_qty in order log
        $totalQty = DB::table('order_log_item')->where('order_log_id', $pId)->sum('p_qty');
        DB::table('order_log')->where('id', $pId)->update([
            'total_qty' => $totalQty,
        ]);

        // update total_price in order log
        $getProductPrice = ProductModel::where('id', $pId)->first();
        $totalPrice = $getProductPrice->price_order * $totalQty;
        DB::table('order_log')->where('id', $pId)->update([
            'total_price' => $totalPrice,
        ]);

        // return back
        return redirect()->back();
    }

    // Method save order log
    public $supplierSet;
    public function _doneOrder()
    {
        // validate
        $this->validate([
            'supplierSet' => 'required',
        ],
            [
                'supplierSet.required' => 'ກະລຸນາເລືອກຜູ້ສະໜອງ',
            ]);

        // get order log status = 0
        $orderLog = DB::table('order_log')->where('status', 0)->first();

        if ($orderLog) {

            // update order log supplier and status =1
            DB::table('order_log')->where('id', $orderLog->id)->update([
                'supplier' => $this->supplierSet,
                'status' => 1,
                'updated_at' => now('Asia/Vientiane'),
            ]);

            // toast sound
            $this->dispatch('success');

            // toast message
            toastr()->success('ບັນທຶກສັ່ງຊື້ສຳເລັດ');

            // redirect to user page
            return $this->redirect('/orders', navigate: true);
        } else {
            // toast message error
            toastr()->error('ບໍ່ສາມາດບັນທຶກສັ່ງຊື້ໄດ້');
        }

        // toast sound
        $this->dispatch('error');

        // toast message
        toastr()->error('ບັນທຶກສັ່ງຊື້ບໍ່ສຳເລັດ');

        // return back
        return redirect()->back();

    }
}