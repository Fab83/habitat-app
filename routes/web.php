<?php

use App\Http\Controllers\BailleurController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\GarantieEmpruntController;
use App\Http\Controllers\ApiDataController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('accueil');
});

Route::resource('bailleurs',BailleurController::class);
Route::resource('operations',OperationController::class);
Route::resource('garantie-emprunts', GarantieEmpruntController::class);

Route::get('/parcelles', [ApiDataController::class, 'show'])->name('parcelles');