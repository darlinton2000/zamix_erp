@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>
        Listar Produtos Simples
        <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">Novo Produto</a>
    </h1>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="box">
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço de Custo</th>
                        <th>Preço de Venda</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>R$ {{ $product->cost_price }}</td>
                            <td>R$ {{ $product->sule_price }}</td>
                            <td>{{ $product->amount }}</td>
                            <td>
                                <!-- Botão Editar -->
                                <a href="{{ route('products.edit', ['id' => $product->id]) }}"
                                    class="btn btn-sm btn-warning">Editar</a>
                                <!-- Botão Excluir -->
                                <form class="inline" method="POST"
                                    action="{{ route('products.destroy', ['id' => $product->id]) }}"
                                    onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    {!! csrf_field() !!}
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $products->links('pagination::bootstrap-4') }}
@stop
