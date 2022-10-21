<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
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
        return view('buyer/pages.index');
    }
}
