<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashSubmission extends Model
{
    /** @use HasFactory<\Database\Factories\TrashSubmissionFactory> */
    use HasFactory;

     protected $fillable = [
        'users_id',
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
