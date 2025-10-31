<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasUuids;

    protected $fillable = [
        'mahasiswa_id',
        'matakuliah_id',
        'tanggal_absensi',
        'status_absen'
    ];

    protected $table = 'absensis';
}
