<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('IndexMahasiswa', ['mahasiswas' => Mahasiswa::all(), 'title'=>'Mahasiswa']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createMahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Mahasiswa::create([
            'name' => $request->name,
            'NIM' => $request->NIM,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan
        ]);

        if($data->save()){
            return redirect()->route('index.mahasiswa');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
    }
}
