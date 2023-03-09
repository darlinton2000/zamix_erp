@extends('adminlte::page')

@section('title', 'Listar Usuários')

@section('content_header')
    <h1>
        Listar Usuários
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Novo Usuário</a>
    </h1>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success')}}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error')}}
        </div>
    @endif

    <div class="box">
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>   
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <!-- Botão Editar -->
                            <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                            <!-- Botão Excluir -->
                            @if ($loggedId !== intval($user->id))
                                <form class="inline" method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    {!! csrf_field() !!}
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>
    </div>
    
    {{ $users->links('pagination::bootstrap-4') }}
@stop