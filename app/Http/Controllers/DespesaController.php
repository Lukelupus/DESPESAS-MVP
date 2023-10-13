<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\DespesaCadastrada;
use App\Models\Despesa;
use App\Models\User;
use Carbon\Carbon;


class DespesaController extends Controller
{


    public function index()
    {
        $despesas = Despesa::with('user')->get();

        return response()->json($despesas);
    }
    public function show($id)
    {
        $despesa = $despesa = Despesa::with('user')->find($id);

        if (!$despesa) {
            return response()->json(['message' => 'Despesa não encontrada'], 404);
        }

        return response()->json($despesa, 200);
    }

    public function store(Request $request)
{



    $request->validate([
        'descricao' => 'required|max:191',
        'data' => 'required|date_format:Y-m-d|before_or_equal:today',
        'valor' => 'required|numeric|min:0',
        'user_id' => 'required|exists:users,id',
    ]);

    try {
        // Cria a despesa no banco de dados
        $despesa = Despesa::create([
            'descricao' => $request->input('descricao'),
            'data' => $request->input('data'),
            'valor' => $request->input('valor'),
            'user_id' => $request->input('user_id'),
        ]);

        $user = User::find($request->input('user_id'));
        if ($user) {
            $user->notify(new DespesaCadastrada($despesa));
            return response()->json(['message' => 'Despesa criada com sucesso'], 201);
        } else {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }

        // Retorna uma resposta de sucesso

    } catch (\Exception $e) {
        // Em caso de erro, retorna uma resposta de erro
        return response()->json(['message' => 'Erro ao criar despesa', 'error' => $e->getMessage()], 500);
    }


}

public function update(Request $request, Despesa $despesa)
{
    $despesaId = $request->route('id');
    $despesa = Despesa::find($despesaId);
    $request->validate([
        'descricao' => 'required|max:191',
        'data' => 'required|date|before_or_equal:today',
        'valor' => 'required|numeric|min:0',
        'user_id' => 'required|exists:users,id', // Ajustado para verificar na tabela "users"
    ]);

    try {
        // Verificar se a despesa existe
        if ($despesa) {
            // Atualize os campos da despesa e salve no banco de dados
            $despesa->update([
                'descricao' => $request->input('descricao'),
                'data' => $request->input('data'),
                'valor' => $request->input('valor'),
                'user_id' => $request->input('user_id'),
            ]);

            $user = User::find($request->input('user_id'));
            if ($user) {
                return response()->json(['message' => 'Despesa Atualizada com sucesso'], 201);
            } else {
                return response()->json(['message' => 'Usuário não encontrado.'], 404);
            } // Código 200 para OK
        } else {
            // Retorne uma resposta de erro, pois a despesa não existe
            return response()->json(['message' => 'Despesa não encontrada'], 404); // Código 404 para não encontrado
        }
    } catch (\Exception $e) {
        // Em caso de erro, retorna uma resposta de erro
        return response()->json(['message' => 'Erro ao atualizar despesa', 'error' => $e->getMessage()], 500); // Código 500 para erro interno do servidor
    }
}

public function destroy(Request $request, Despesa $despesa)
{
    $despesaId = $request->route('id');
    $despesa = Despesa::find($despesaId);
    try {

        if ($despesa) {
            // Exclua a despesa
            $despesa->delete();

            // Retorne uma resposta de sucesso
            return response()->json(['message' => 'Despesa excluída com sucesso'], 200); // Código 200 para OK
        } else {
            // Retorne uma resposta de erro, pois a despesa não existe
            return response()->json(['message' => 'Despesa não encontrada'], 404); // Código 404 para não encontrado
        }
    } catch (\Exception $e) {
        // Em caso de erro, retorne uma resposta de erro
        return response()->json(['message' => 'Erro ao excluir despesa', 'error' => $e->getMessage()], 500); // Código 500 para erro interno do servidor
    }
}



}
