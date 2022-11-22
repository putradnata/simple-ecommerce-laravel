<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function paymentIndex()
    {
        $data = Order::join('detail_orders', 'detail_orders.order_id', 'orders.id')
                        ->select('orders.*','detail_orders.status')
                        ->distinct()
                        ->get();

        return view('admin/pages/payment.index',[
            'data' => $data,
        ]);
    }

    public function paymentUpdate(Request $request, $id)
    {
        if($request->status == 'a'){
            $data_status['status'] = 'On Process';
        }else{
            $data_status['status'] = 'Payment Failed';
        }

        $data = DetailOrder::where('order_id', $id)->update($data_status);

        return redirect('admin/payment');
    }

    public function createShipping($id)
    {
        return view('layouts.seller.uploadresi', ['invoice' => $id]);
    }

    public function storeShipping(Request $request)
    {
        $data_status = $request->validate([
            'airwaybill' => 'required',
        ]);

        $data_status['status'] = "Shipping";

        $data = DetailOrder::where('seller_id', Auth::user()->id)->update($data_status);

        return redirect('seller/order');
    }
}
