<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DespesaController;
use Laravel\Passport\Passport;


//
Route::post('login', [AuthController::class, 'login']);
Route::post('register',[AuthController::class, 'register']);


Route::get('/usuarios', [UserController::class, 'index']);
Route::get('/usuarios/{id}', [UserController::class, 'show']);
Route::get('/usuarios/{id}/despesas', [UserController::class, 'getDespesas']);

Route::get('/despesas', [DespesaController::class, 'index']);
Route::get('/despesas/{id}', [DespesaController::class, 'show']);
Route::post('/despesas/criar', [DespesaController::class, 'store']);
Route::put('/despesas/{id}/atualizar', [DespesaController::class, 'update']);
Route::delete('/despesas/{id}/excluir', [DespesaController::class, 'destroy']);



