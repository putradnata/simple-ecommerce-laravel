<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Bank;
use App\Models\Order;
use App\Models\DetailOrder;
use Auth;

class CustomerController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $data_cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $id)->first();

        if($data_cart <> null){
            $data['qty'] = $request->qty + $data_cart['qty'];

            $cart = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->update($data);

            return redirect()->back();
        }

        $data['user_id'] = Auth::user()->id;
        $data['product_id'] = $id;
        $data['qty'] = $request->qty;

        $cart = Cart::create($data);

        return redirect()->back();
    }

    public function showCart()
    {
        $data = [];

        $data_seller = Cart::join('products', 'products.id', 'carts.product_id')
                    ->join('users', 'users.id', 'products.user_id')
                    ->where('carts.user_id', Auth::user()->id)
                    ->where('products.status', 'Active')
                    ->select('users.name')
                    ->groupBy('users.name')
                    ->get();

        foreach($data_seller as $key => $data_seller){

            $data[$key]['seller_name'] = $data_seller->name;

            $data_cart = Cart::join('products', 'products.id', 'carts.product_id')
                    ->join('users', 'users.id', 'products.user_id')
                    ->where('carts.user_id', Auth::user()->id)
                    ->where('users.name', $data_seller->name)
                    ->where('products.status', 'Active')
                    ->select('products.*', 'carts.qty')
                    ->get();

            foreach($data_cart as $key2 => $data_cart){
                $data[$key]['product'][$key2] = $data_cart;
            }
        }

        return view('website/pages.cart',[
            'data' => $data,
        ]);
    }

    public function order()
    {
        $data_cart = Cart::join('products', 'products.id', 'carts.product_id')
                    ->where('carts.user_id', Auth::user()->id)
                    ->where('products.status', 'Active')
                    ->select('products.*', 'carts.qty')
                    ->get();

        $data_bank = Bank::all();

        return view('website/pages.checkout',[
            'data' => $data_cart,
            'data_bank' => $data_bank,
        ]);
    }

    public function checkout(Request $request)
    {
        $data_order = $request->validate([
            'email' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'payment' => 'required',
            'shipper' => 'required',
        ]);

        $data_order['invoice_code'] = 'INV-' . time() . '-' . strtoupper(Str::random(5));
        $data_order['buyer_id'] = Auth::user()->id;
        $data_order['total'] = $request->total;
        $data_order['payment_img'] = null;

        $data_detail_order['shipper'] = $data_order['shipper'];
        $data_detail_order['status'] = 'Waiting Payment';

        unset($data_order['shipper']);

        $new_data_order = Order::create($data_order)->id;

        $data_cart = Cart::where('user_id', Auth::user()->id)->get();

        for ($i = 0; $i < count($data_cart); $i++) {
            $product_search = Product::find($data_cart[$i]->product_id);

            $new_detail_order = [
                'order_id' => $new_data_order,
                'seller_id' => $product_search->user_id,
                'product_name' => $product_search->name,
                'qty' => $data_cart[$i]->qty,
                'price' => $product_search->price,
                'shipper' => $data_detail_order['shipper'],
                'status' => $data_detail_order['status'],
            ];


            $data_order_detail = DetailOrder::create($new_detail_order);

            $delete_cart = Cart::where('id', $data_cart[$i]->id)->delete();
        }

        // return view('website/pages.checkout',[
        //     'data' => $data_cart,
        //     'data_bank' => $data_bank,
        // ]);
    }

    public function paymentUpload(Request $request, $id)
    {
        $data_attachment = $request->validate([
            'attachment' => 'required|image|mimes:jpeg,bmp,png|max:2048',
        ]);

        $image    = $request->file('attachment');
        $new_name =   uniqid().'_'.time().'.'.$image->extension();
        $image->move(public_path('photos'), $new_name);

        $data_order['payment_img'] = $new_name;

        $data_detail_order['status'] = 'Checking Payment';

        $data = Order::where('id', $id)->update($data_order);

        $data_detail = DetailOrder::where('order_id', $id)->update($data_detail_order);

        //return redirect('buyer/order/order-list');
    }

}
