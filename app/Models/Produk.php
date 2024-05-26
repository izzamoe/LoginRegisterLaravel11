<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desc', 'price', 'image'];
    protected $hidden = ['created_at', 'updated_at'];
    public function Historybuys()
    {
        return $this->hasMany(Historybuys::class);
    }
}
