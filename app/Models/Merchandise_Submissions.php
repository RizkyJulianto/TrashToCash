<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchandise_Submissions extends Model
{
    protected $fillable = [
        'users_id',
        'merchandise_id',
        'tgl_transaksi',
        'status',
    ];

    public function Users() {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function Merchandise() {
        return $this->belongsTo(Merchandise::class, 'merchandise_id');
    }
}
