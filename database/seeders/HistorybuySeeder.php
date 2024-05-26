<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorybuySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::find(1);
         $user->historybuys()->create([
              'produk_id' => 1,
              'purchased_at' => now(),
         ]);
    }
}
