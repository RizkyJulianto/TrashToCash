<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'mitra_id',
        'name_product',
        'description',
        'stock',
        'photo',
        'product_point'
    ];


    public function Users() {
        return $this->belongsTo(User::class, 'mitra_id');
    }

    public function Transactions() {
        return $this->hasMany(Transaction::class, 'product_id');
    }
}
