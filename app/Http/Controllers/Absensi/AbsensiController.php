<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Exception;

class AbsensiController extends Controller
{
    public function index(){
        return view('Absensi.AbsensiIndex',[
            'mahasiswas'=> Mahasiswa::all(),
            'matakuliahs'=>Matakuliah::all(),
            'title'=>'Absensi'
        ]);
    }

    public function store($request){
        try {

        } catch(Exception $e){
           
        }
    }
}
