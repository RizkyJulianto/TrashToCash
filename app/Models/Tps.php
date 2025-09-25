<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{

    use HasFactory;

    protected $fillable = [
        'name_tps',
        'address',
        'phone_number',
    ];

    public function Transactions() {
        return $this->hasMany(Transaction::class, 'tps_id');
    }
}
