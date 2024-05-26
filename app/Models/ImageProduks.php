<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduks extends Model
{
    use HasFactory;

//    fillable
    protected $fillable = [
        'produk_id',
        'image'
    ];

//    hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function Produk()
    {
        return $this->belongsTo(Produk::class);
    }

}
