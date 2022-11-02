<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website/pages.index');
    }

    public function AfterRegister()
    {
        return view('components/register-success');
    }

    public function AdminIndex()
    {
        return view('admin/pages/banks.form');
    }

    public function SellerIndex()
    {
        return view('seller/pages/orders/sent.index');
    }

    public function BuyerIndex()
    {
        return view('buyer/pages.index');
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
