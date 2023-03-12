@extends('adminlte::page')

@section('title', 'Listar Estoque')

@section('content_header')
    <h1>
        Listar Estoque
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
            @if ($stocks->isEmpty())
                <div class="alert alert-danger">Nenhum registro foi encontrado!</div>
            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produto</th>
                            <th>Quantidade Entrada</th>
                            <th>Quantidade Saída</th>
                            <th>Preço Custo Total</th>
                            <th>Preço Venda Total</th>
                            <th>Data Entrada</th>
                            <th>Data Saída</th>
                        </tr>
                    </thead>
                    <tbody>   
                        @foreach ($stocks as $stock)
                        <tr>
                            <td>{{ $stock->id }}</td>
                            <td>{{ $stock->product->name }}</td>
                            <td>{{ $stock->amount_entry }}</td>

                            @if ($stock->amount_exit)
                                <td>{{ $stock->amount_exit }}</td>
                            @else
                                <td> - </td>
                            @endif

                            <td>R$ {{ $stock->amount_entry * $stock->cost_price }}</td>
                            <td>R$ {{ $stock->amount_entry * $stock->sule_price }}</td>
                            <td>{{ \Carbon\Carbon::parse($stock->date_entry)->format('d/m/Y')}}</td>

                            @if (isset($stock->date_exit))
                                <td>{{ \Carbon\Carbon::parse($stock->date_exit)->format('d/m/Y')}}</td>
                            @else
                                <td> - </td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody> 
                </table>

                <div class="mx-auto text-center">
                    {{ $stocks->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>
    </div>
@stop