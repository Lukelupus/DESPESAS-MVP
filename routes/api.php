<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// ...

Route::post('login', [AuthController::class, 'login']);
Route::post('register',[AuthController::class, 'register']);



// Rotas protegidas pela autenticação
Route::middleware('auth:api')->group(function () {
    Route::resource('despesas', 'DespesaController');
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
