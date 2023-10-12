@extends('layouts.app')

@section('content')
    <h1>Lista de Usuários</h1>
    <ul>
        @foreach ($usuarios as $usuario)
            <li>{{ $usuario->nome }}</li>
            <!-- Outros campos do usuário -->
        @endforeach
    </ul>
@endsection
