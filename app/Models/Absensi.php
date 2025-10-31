<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'NIM',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'jurusan',
        'angkatan'
    ];

    protected $table = 'table_mahasiswa';

    public $timestamps = false;

    public function mkSemester()
    {
        return $this->hasMany(mkSemester::class, 'id', 'mahasiswa_id');
    }
}
