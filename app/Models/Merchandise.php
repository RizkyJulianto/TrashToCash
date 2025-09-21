<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    protected $fillable = [
        'mitra_id',
        'nama_produk',
        'deskripsi',
        'stok',
        'gambar',
        'reward_point',
    ];


    public function Users() {
        return $this->belongsTo(User::class, 'mitra_id');
    }
}
