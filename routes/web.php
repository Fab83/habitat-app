<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\BailleurController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\GarantieEmpruntController;


Route::get('/', function () {
    return view('accueil');
});

Route::resource('bailleurs',BailleurController::class);
Route::resource('operations',OperationController::class);
Route::resource('garantie-emprunts', GarantieEmpruntController::class);
Route::resource('programmes', ProgrammeController::class);


Route::get('/parcelles', [ApiDataController::class, 'show'])->name('parcelles');