<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class HomeControllers extends Controller
{
    public function index() : View
    {
//        get all produk
        $produk = Produk::all();
//        send all to view
        return view('store', ['produk' => $produk, 'user' => auth()->user()]);
    }
}
