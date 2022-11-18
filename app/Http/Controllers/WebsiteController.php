<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
        return view('admin/pages.index');
    }

    public function SellerIndex()
    {
        return view('seller/pages.index');
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
