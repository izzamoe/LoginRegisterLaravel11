<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class HomeControllers extends Controller
{
    public function index() : View
    {
//        get all produk
        $produk = Produk::all();
//        send all to view
        return view('store', ['produk' => $produk, 'user' => auth()->user()]);
    }

    public function buy(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'produk_id' => 'required|exists:produks,id'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        // Dapatkan pengguna yang sudah diautentikasi
        $user = Auth::user();

        // Cek apakah user sudah pernah membeli produk ini
        if ($user->historybuys()->where('produk_id', $request->produk_id)->exists()) {
            return back()->withErrors([
                'message' => 'You already bought this product'
            ]);
        }

        // Buat riwayat pembelian baru
        $buyed = $user->historybuys()->create([
            'produk_id' => $request->produk_id,
            'purchased_at' => now(),
        ]);

        return redirect()->route('dashboard.store')->with('success', 'Product purchased successfully');
    }
}
