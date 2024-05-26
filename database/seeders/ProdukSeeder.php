<?php

namespace Database\Seeders;


use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Produk::create([
            "name" => "God Of War",
            "desc" => "Dalam God of War, pemain mengendalikan Kratos, mantan pelayan Ares yang dikirim oleh para dewa Yunani untuk membunuh Ares, dewa perang",
            "price" => 1280000,
            "image" => "https://icons.iconarchive.com/icons/3xhumed/mega-games-pack-33/256/God-of-War-III-2-icon.png",
        ]);

        Produk::create([
            "name" => "Bounce Tales",
            "desc" => "Tokoh utama adalah Bounce, bola merah yang ceria. Ia menjelajahi dunia fantasi dan menghadapi penduduk berbahaya yang dipengaruhi oleh kubus hipnotis.",
            "price" => 528000,
            "image" => "https://play-lh.googleusercontent.com/E0VhBnUb512NTj7RyMHJDodbPD2vcTDf2O8AkkLh2ULyBXeRRxkUtmGg74811enmZLJN=w240-h480-rw",
        ]);

//        Cyberpunk adalah subgenre fiksi ilmiah dengan latar futuristik distopia yang menggabungkan teknologi canggih dengan kemerosotan sosial, termasuk kecerdasan buatan dan cyberware.
        Produk::create(
            [
                "name" => "Cyberpunk 2077",
                "desc" => "Cyberpunk adalah subgenre fiksi ilmiah dengan latar futuristik distopia yang menggabungkan teknologi canggih dengan kemerosotan sosial, termasuk kecerdasan buatan dan cyberware.",
                "price" => 1280000,
                "image" => "https://icons.iconarchive.com/icons/3xhumed/mega-games-pack-33/256/Cyberpunk-2077-icon.png",
            ]);


    }
}
