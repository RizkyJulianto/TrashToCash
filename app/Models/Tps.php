<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{

    use HasFactory;

    protected $fillable = [
        'nama_tps',
        'alamat',
        'no_telp',
    ];

    // public function TrashSubmission() {
    //     return $this->hasMany(Trash_Submissions::class, 'tps_id');
    // }
}
