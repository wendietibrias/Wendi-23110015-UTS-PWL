<?php

use App\Http\Controllers\Absensi\AbsensiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliah\MataKuliahController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::group(['prefix' => 'mahasiswa'], function () {
        Route::get('/', [MahasiswaController::class, 'index'])->name('index.mahasiswa');
        Route::get('/create', [MahasiswaController::class, 'create'])->name('create.mahasiswa');
        Route::post('/store', [MahasiswaController::class, 'store'])->name('store.mahasiswa');
        Route::delete("/delete/{id}", [MahasiswaController::class, 'destroy'])->name('mahasiswa.delete');
        Route::get('/edit/{id}', [MahasiswaController::class, 'find'])->name('mahasiswa.edit');
    });

    Route::group(['prefix'=>'absensi'], function(){
        Route::get('/',[AbsensiController::class,'index'])->name('index.absensi');
    });

    Route::group(['prefix' => 'mata-kuliah'], function () {
        Route::get('/', [MataKuliahController::class, 'index'])->name('mata_kuliah.view');
        Route::get('/create', [MataKuliahController::class, 'createView'])->name("mata_kuliah.create.view");
        Route::post('/store', [MataKuliahController::class, 'store'])->name("mata_kuliah.create");
        Route::delete("/delete/{id}", [MataKuliahController::class, 'destroy'])->name('mata_kuliah.delete');
        Route::get('/edit/{id}', [MataKuliahController::class, 'find'])->name('mata_kuliah.edit');
    });
});
