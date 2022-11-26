<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\DetailOrder;
use Auth;
use Carbon\Carbon;

class WebsiteController extends Controller
{
    public function index()
    {
        $product = Product::where('status', 'Active')->get();

        return view('website/pages.index', [
            'data' => $product,
        ]);
    }

    public function AfterRegister()
    {
        return view('components/register-success');
    }

    public function AdminIndex()
    {
        $product = Product::count();
        $seller = User::where('role', 'S')->count();
        $buyer = User::where('role', 'B')->count();
        $order = Order::count();

        return view('admin/pages.index', ['product' => $product, 'seller' => $seller, 'buyer' => $buyer, 'order' => $order]);
    }

    public function AdminProfile()
    {
        return view('admin/pages.profile');
    }

    public function SellerProfile()
    {
        return view('admin/pages.profile');
    }

    public function SellerIndex()
    {
        $product = Product::where('user_id', Auth::user()->id)->count();

        $orderToday = DetailOrder::whereDay('updated_at', Carbon::now()->day)
            ->where('seller_id', Auth::user()->id)
            ->where('status', '<>', 'Waiting Payment')
            ->where('status', '<>', 'Checking Payment')
            ->where('status', '<>', 'Cancelled')
            ->where('status', '<>', 'Payment Failed')
            ->select('order_id', 'seller_id')
            ->distinct()
            ->get();

        $orderReceived = DetailOrder::where('status', 'Received')
            ->where('seller_id', Auth::user()->id)
            ->select('order_id', 'seller_id')->distinct()->get();

        $orderTotal = DetailOrder::where('status', '<>', 'Payment Failed')
            ->where('status', '<>', 'Waiting Payment')
            ->where('status', '<>', 'Checking Payment')
            ->where('status', '<>', 'Cancelled')
            ->where('seller_id', Auth::user()->id)
            ->select('order_id', 'seller_id')
            ->distinct()
            ->get();

        return view('seller/pages.index', ['product' => $product, 'orderToday' => $orderToday, 'orderTotal' => $orderTotal, 'orderReceived' => $orderReceived]);
    }

    public function BuyerIndex()
    {
        $product = Product::where('status', 'Active')->get();

        return view('website/pages.index', [
            'data' => $product,
        ]);
    }

    public function About()
    {
        return view('website/pages.about');
    }

    public function HowToShop()
    {
        return view('website/pages.how-to-shop');
    }
}
