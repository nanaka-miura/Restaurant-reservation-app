<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop-list');
    }
    public function done()
    {
        return view('reserve-completed');
    }

    public function detail()
    {
        return view('shop-detail');
    }
}
