<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'users_id',
        'tps_id',
        'product_id',
        'type',
        'quantity',
        'type_bank',
        'type_wallet',
        'phone_number',
        'bank_number',
        'trash',
        'weight',
        'photo',
        'points',
        'description',
        'totals',
        'status',
        'qrcode'
    ];

    public function Users() {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function Tps() {
        return $this->belongsTo(Tps::class, 'tps_id');
    }
    public function Products() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
