@extends('adminlte::page')

@section('title', 'Listar Requisições')

@section('content_header')
    <h1>
        Listar Requisições
        {{-- <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Novo Usuário</a> --}}
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
                        <th>Nome do Funcionário</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Data da Retirada</th>
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
                    </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>
    </div>
    
    {{ $requisitions->links('pagination::bootstrap-4') }}
@stop