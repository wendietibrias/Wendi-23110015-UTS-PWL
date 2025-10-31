<?php

namespace App\Http\Controllers\MataKuliah;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMataKuliahRequest;
use App\Models\Matakuliah;
use Exception;
use Illuminate\Http\Request;
use Log;
use Str;

class MataKuliahController extends Controller
{
       public function index()
    {
        return view('MataKuliah.MataKuliahIndex', [
            'title' => 'Mahasiswa',
            'matakuliahs' => Matakuliah::all(),
        ]);
    }

    public function createView()
    {
        return view("MataKuliah.MataKuliahForm", [
            'title' => 'Create Mata Kuliah',
            'type' => 'CREATE',
        ]);
    }

    public function find($id)
    {
        $matakuliah = MataKuliah::find($id);

        return view('MataKuliah.MataKuliahForm', [
            'matakuliah' => $matakuliah,
            'title' => 'Update Mata Kuliah',
        ]);
    }

    public function store(CreateMataKuliahRequest $request)
    {
        try {
            $request->validated();

            if (isset($request->id)) {
                /** Update */
                $updatemk = MataKuliah::find($request->id);
                $updatemk->kode = $request->kode;
                $updatemk->nama_matakuliah = $request->nama_matakuliah;

                if ($updatemk->save()) {
                    return redirect()->route('mata_kuliah.view')->with('message', 'Berhasil Mengedit Mahasiswa');
                }
            } else {
                $mahasiswa = Matakuliah::create([
                    'kode'=> $request->kode,
                    'nama_matakuliah'=>$request->nama_matakuliah
                ]);

                if ($mahasiswa->save()) {
                    return redirect()->route(route: 'mata_kuliah.view', )->with('message', 'Berhasil Menambahkan Data');
                }
            }

        } catch (Exception $e) {
            Log::info($e);
            return redirect()->route(route: 'mata_kuliah.view', )->with('messageError', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $findmk = MataKuliah::find($id);

            if (!$findmk) {
                return redirect()->route('mata_kuliah.view')->with('message', 'Mahasiswa Tidak Ditemukan');
            }

            $deletemk = $findmk->delete();
            if ($deletemk) {
                return redirect()->route('mata_kuliah.view')->with('message', 'Berhasil Menghapus Mahasiswa');
            }

        } catch (Exception $e) {
            return redirect()->route(route: 'mata_kuliah.view', )->with('messageError', $e->getMessage());
        }
    }
}
