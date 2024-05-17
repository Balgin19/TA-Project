<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RencanaAnggaranController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SppController;


Route::get('/', function () {
    return view('dashboard');
});

Route::get('/program', [ProgramController::class, 'program'])->name('program');
Route::post('/program/create', [ProgramController::class, 'create']);
Route::put('/program/{id_proker}/update', [ProgramController::class,'update']);
Route::get('/program/{id_proker}/delete', [ProgramController::class, 'delete']);

Route::get('/rencaran', [RencanaAnggaranController::class, 'rencaran'])->name('rencaran');
Route::post('/rencaran/create', [RencanaAnggaranController::class, 'create']);
Route::get('/rencaran/{id_rencana}/edit',[RencanaAnggaranController::class,'edit']);
Route::put('/rencaran/{id_rencana}/update', [RencanaAnggaranController::class,'update']);
Route::get('/rencaran/{id_rencana}/delete',[RencanaAnggaranController::class,'delete']);


Route::get('/spp', [SppController::class, 'spp'])->name('spp');
 