<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ProfileControllers extends Controller
{
//    index
    public function index()
    {
//         get data user
        $user = auth()->user();
        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    }

//    get list owned game product
    public function library()
    {
//      $listGame = Auth::user()->historybuys()->with('produk')->get();
        $listGame = auth()->user()->historybuys()->with('produk')->get();
        return response()->json([
            'message' => 'success',
            'data' => $listGame
        ]);
    }
}
