<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trash_Submissions extends Model
{
    protected $fillable = [
        'userd_id',
        'tps_id',
        'jenis_sampah',
        'berat',
        'gambar',
        'point_reward',
        'tgl_transaksi',
        'status',
        'qrcode',
    ];

    public function User() {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function Tps() {
        return $this->belongsTo(Tps::class, 'tps_id');
    }
}
