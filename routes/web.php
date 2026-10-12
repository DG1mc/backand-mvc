<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;

// Route closure & parameter dasar
Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo/{nama}', function (string $nama) {
    return "Halo, {$nama}! Selamat datang di praktikum Laravel.";
});

// Route Controllers & Form (Wajib ditaruh sebelum route {nim})
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('log.request');
Route::get('/mahasiswa/create/form', [MahasiswaController::class, 'create']);

// Route Parameter Dinamis
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show']);
Route::get('/mahasiswa/{nim}/{nama}', function (string $nim, string $nama) {
    return "NIM: {$nim} | Nama: {$nama}";
});

// Route POST Form Submission
Route::post('/mahasiswa', function (Request $request) {
    return response()->json([
        'message' => 'Data mahasiswa berhasil diterima',
        'data' => [
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'jurusan' => $request->input('jurusan'),
        ]
    ]);
});
