<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMahasiswaRequest;
use App\Models\Mahasiswa;
use Exception;
use Illuminate\Http\Request;
use Log;
use Mockery\Expectation;

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
 public function store(CreateMahasiswaRequest $request)
    {
        try {
            $request->validated();

            if (isset($request->id)) {
                /** Update */
                $updateMahasiswa = Mahasiswa::find($request->id);
                $updateMahasiswa->name = $request->name;
                // $updateMahasiswa->email = $request->email;
                $updateMahasiswa->NIM= $request->NIM;
                $updateMahasiswa->jurusan = $request->jurusan;
                // $updateMahasiswa->angkatan = $request->angkatan;
                // $updateMahasiswa->tempat_lahir = $request->tempat_lahir;
                // $updateMahasiswa->tanggal_lahir = $request->tanggal_lahir;

                if ($updateMahasiswa->save()) {
                    return redirect()->route('index.mahasiswa')->with('message', 'Berhasil Mengedit Mahasiswa');
                }
            } else {
                $mahasiswa = Mahasiswa::create($request->only(['name','NIM','jurusan']));

                if ($mahasiswa->save()) {
                    return redirect()->route(route: 'index.mahasiswa', )->with('message', 'Berhasil Menambahkan Data');
                }
            }

        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->route(route: 'index.mahasiswa', )->with('messageError', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $findMahasiswa = Mahasiswa::find($id);

            if (!$findMahasiswa) {
                return redirect()->route('index.mahasiswa')->with('message', 'Mahasiswa Tidak Ditemukan');
            }

            $deleteMahasiswa = $findMahasiswa->delete();
            if ($deleteMahasiswa) {
                return redirect()->route('index.mahasiswa')->with('message', 'Berhasil Menghapus Mahasiswa');
            }

        } catch (Exception $e) {
            return redirect()->route(route: 'index.mahasiswa', )->with('messageError', $e->getMessage());
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
  
}
