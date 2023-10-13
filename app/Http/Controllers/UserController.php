<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Despesa;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return response()->json($usuarios);
    }
    public function getDespesas($id)
{
    $usuario = User::find($id);

    if (!$usuario) {
        return response()->json(['message' => 'Usuário não encontrado'], 404);
    }

    $despesas = Despesa::where('user_id', $id)->get();

    return response()->json($despesas);
}
public function show($id)
{
    $usuario = $usuario = User::find($id);

    if (!$usuario) {
        return response()->json(['message' => 'Despesa não encontrada'], 404);
    }

    return response()->json($usuario, 200);
}
}
