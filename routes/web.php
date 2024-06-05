<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RencanaAnggaranController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('dashboards.index');
});


Route::get('/login', [AuthController::class, 'login']);
Route::post('/postlogin', [AuthController::class, 'postlogin']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/program', [ProgramController::class, 'program'])->name('program');
Route::post('/program', [ProgramController::class, 'create'])->name('program.create');
Route::put('/program/{id_proker}', [ProgramController::class,'update'])->name('program.update');
Route::get('/program/{id_proker}', [ProgramController::class, 'delete'])->name('program.delete');

Route::get('/rencaran', [RencanaAnggaranController::class, 'rencaran'])->name('rencaran');
Route::post('/rencaran', [RencanaAnggaranController::class, 'create'])->name('rencaran.create');
Route::put('/rencaran/{id_rencana}', [RencanaAnggaranController::class,'update'])->name('rencaran.update');
Route::get('/rencaran/{id_rencana}', [RencanaAnggaranController::class,'delete'])->name('rencaran.delete');
Route::get('/rencaran/{id_rencana}/edit', [RencanaAnggaranController::class,'edit'])->name('rencaran.edit');

Route::get('/spp', [SppController::class, 'spp'])->name('spp');
Route::get('/spp/tambah', [SppController::class, 'tambahSpp'])->name('spp.tambah');
Route::get('/get-harga-jumlah', [SppController::class, 'getHargaJumlah'])->name('getHargaJumlah');
Route::post('/spp/create', [SppController::class, 'create'])->name('spp.create');
Route::delete('/spp/{id}', [SppController::class, 'delete'])->name('spp.delete');
Route::post('/spp/{id}/approve', [SppController::class, 'approve'])->name('spp.approve');
Route::post('/spp', [SppController::class, 'store'])->name('spp.store');
Route::get('/spp/{id}', [SppController::class, 'show'])->name('spp.show');

 