<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    public function paymentIndex()
    {
        $data = Order::join('detail_orders', 'detail_orders.order_id', 'orders.id')
                        ->where('detail_orders.status', '<>', 'Waiting Payment')
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

    public function indexOrder(Request $request){
        if($request->status == "On Process"){
            $data = Order::join('detail_orders', 'detail_orders.order_id', 'orders.id')
                        ->where('detail_orders.seller_id', Auth::user()->id)
                        ->where('detail_orders.status', "On Process")
                        ->select('orders.*','detail_orders.shipper', 'detail_orders.status')
                        ->distinct()
                        ->get();
        }else if($request->status == "Shipping"){
            $data = Order::join('detail_orders', 'detail_orders.order_id', 'orders.id')
                        ->where('detail_orders.seller_id', Auth::user()->id)
                        ->where('detail_orders.status', "Shipping")
                        ->select('orders.*','detail_orders.shipper', 'detail_orders.status')
                        ->distinct()
                        ->get();
        }else{
            $data = Order::join('detail_orders', 'detail_orders.order_id', 'orders.id')
                        ->where('detail_orders.seller_id', Auth::user()->id)
                        ->where('detail_orders.status', '<>', 'Waiting Payment')
                        ->where('detail_orders.status', '<>', 'Checking Payment')
                        ->where('detail_orders.status', '<>', 'Failed Payment')
                        ->where('detail_orders.status', '<>', 'Cancelled')
                        ->select('orders.*','detail_orders.shipper', 'detail_orders.status')
                        ->distinct()
                        ->get();
        }

        return view('seller/pages/orders/information.index', [
            'data' => $data,
            'status' => $request->status,
        ]);
    }

    public function createShipping(Request $request)
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
