@extends('adminlte::page')

@section('title', 'Listar Produtos Compostos')

@section('content_header')
    <h1>
        Listar Produtos Compostos
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
            @if ($compositeProducts->isEmpty())
                <div class="alert alert-danger">Nenhum registro foi encontrado!</div>
            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Preço Custo</th>
                            <th>Quantidade</th>
                            <th>Produto</th>
                            <th>Preço Custo</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>   
                        @foreach ($compositeProducts as $compositeProduct)
                        <tr>
                            <td>{{ $compositeProduct->name }}</td>
                            <td>R$ {{ $compositeProduct->sule_price }}</td>
                            <td>{{ $compositeProduct->amount }}</td>
                            <td>{{ $compositeProduct->product->name  }}</td>
                            <td>R$ {{ $compositeProduct->cost_price }}</td>
                            <td>R$ {{ $compositeProduct->subtotal }}</td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
            @endif 
        </div>
    </div>
    
    {{ $compositeProducts->links('pagination::bootstrap-4') }}
@stop