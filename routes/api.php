<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware("SetLocalization")->group(function () {
    Route::get('/data/{id}', [DataController::class, 'show']);
    Route::get('/data', [DataController::class, 'index']);
    Route::post('/data/store', [DataController::class, 'store']);  // Ensure this is correct
});


