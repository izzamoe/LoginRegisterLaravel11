<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class HomeControllers extends Controller
{
    public function index() : View
    {
        return view('home', ['user' => auth()->user()]);
    }
}
