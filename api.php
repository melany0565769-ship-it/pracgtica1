<?php
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController; // <-- Aquí estaba el error (el "/" extra)
 
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 
// Esta es la ruta para que funcione tu CRUD de productos
Route::apiResource('productos', ProductoController::class);
