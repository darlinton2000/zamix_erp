@extends('adminlte::page')

@section('title', 'Listar Requisições')

@section('content_header')
    <h1>
        Listar Requisições
        <a href="{{ route('requisitions.create') }}" class="btn btn-sm btn-success">Nova Requisição</a>
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
            @if ($requisitions->isEmpty())
                <div class="alert alert-danger">Nenhum registro foi encontrado!</div>
            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Funcionário</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Data da Retirada</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>   
                        @foreach ($requisitions as $requisition)
                        <tr>
                            <td>{{ $requisition->id }}</td>
                            <td>{{ $requisition->user->name }}</td>
                            <td>{{ $requisition->product->name }}</td>
                            <td>{{ $requisition->amount }}</td>
                            <td>{{ \Carbon\Carbon::parse($requisition->withdrawal_date)->format('d/m/Y')}}</td>
                            <td>
                                <!-- Botão Editar -->
                                <a href="{{ route('requisitions.edit', ['id' => $requisition->id]) }}"
                                   class="btn btn-sm btn-warning">Editar</a>
                                <!-- Botão Excluir -->
                                <form class="inline" method="POST"
                                      action="{{ route('requisitions.destroy', ['id' => $requisition->id]) }}"
                                      onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    {!! csrf_field() !!}
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>

                <div class="mx-auto text-center">
                    {{ $requisitions->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>
    </div>
@stop