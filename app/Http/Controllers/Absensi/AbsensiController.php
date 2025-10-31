<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

class AbsensiController extends Controller
{
    public function index(){
        return view('Absensi.AbsensiIndex',[
            'mahasiswas'=> Mahasiswa::all(),
            'matakuliahs'=>Matakuliah::all(),
            'title'=>'Absensi'
        ]);
    }
}
