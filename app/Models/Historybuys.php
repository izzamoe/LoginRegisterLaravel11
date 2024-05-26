<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Historybuys extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'produk_id', 'purchased_at'];

//    hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
