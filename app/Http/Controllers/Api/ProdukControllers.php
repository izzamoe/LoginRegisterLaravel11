<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProdukControllers extends Controller
{
//    get list all produk
    public function index()
    {
        Produk::all();
        return response()->json([
            'message' => 'success',
            'data' => Produk::all()
        ]);
    }

//    get detail game
    public function show($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json([
                'message' => 'Not Found'
            ], 404);
        }
        return response()->json([
            'message' => 'success',
            'data' => $produk
        ]);
    }

//    buy
    public function buy(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'produk_id' => 'required|exists:produks,id'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Dapatkan pengguna yang sudah diautentikasi
        $user = Auth::user();

        // Cek apakah user sudah pernah membeli produk ini
        if ($user->historybuys()->where('produk_id', $request->produk_id)->exists()) {
            return response()->json([
                'message' => 'You already bought this product'
            ], 400);
        }

        // Buat riwayat pembelian baru
        $buyed = $user->historybuys()->create([
            'produk_id' => $request->produk_id,
            'purchased_at' => now(),
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $buyed
        ], 201);
    }

//    upload file
    public function upload(Request $request)
    {

        dd($request->all());
        // Validasi data
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Dapatkan pengguna yang sudah diautentikasi
        $user = Auth::user();

        // Simpan file ke storage
        $path = $request->file('image')->store('public/images');

        // Simpan path ke database
        $user->imageproduks()->create([
            'image' => $path
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $path
        ], 201);
    }


}
