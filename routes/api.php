<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DespesaController;


//

Route::post('login', [AuthController::class, 'login']);
Route::post('register',[AuthController::class, 'register']);


Route::get('/usuarios', [UserController::class, 'index']);

Route::post('/despesas/criar', [DespesaController::class, 'store']);
Route::put('/despesas/{id}/atualizar', [DespesaController::class, 'update']);
Route::delete('/despesas/{id}/excluir', [DespesaController::class, 'destroy']);


// Rotas protegidas pela autenticação
//Route::middleware('auth:api')->get('/despesas', [DespesaController::class, 'index']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
