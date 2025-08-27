<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\TipoDocumentoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/Cliente/get-all', [ClienteController::class, 'getAllClientes'])->name('Cliente.getAll');
    Route::resource('/Cliente', ClienteController::class);
});

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('tipoDocumento/TomSelect', [TipoDocumentoController::class, 'tipoDocumentoTomSelect'])->name('tipoDocumento.tomSelect');
});

Route::prefix('admin')->middleware('auth')->group(function(){

    Route::resource('dispositivo', DispositivoController::class);
});