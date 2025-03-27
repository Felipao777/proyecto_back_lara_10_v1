<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\Prueba;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\Trab_habController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Rutas Auth
Route::prefix('/v1/auth')->group(function(){
    Route::post('/login',[AuthController::class,"funLogin"]);
    Route::post('/register',[AuthController::class,"funRegistro"]);
    Route::middleware('auth:sanctum')->group(function (){
        Route::get('/perfil',[AuthController::class,"funPerfil"]);
        Route::post('/logout',[AuthController::class,"funSalir"]);   
        
    });
});
Route:: get('prueba', [PruebaController::class,"funPrueba"]);

Route::post("trab_hab/{id}/actualizar-imagen",[Trab_habController::class, "actualizarImagen"]);

Route::apiResource("empresa", EmpresaController::class);
Route::apiResource("trab_hab", Trab_habController::class);
