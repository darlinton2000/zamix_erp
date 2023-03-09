@extends('adminlte::page')

@section('title', 'Relatório de Entrada de Estoque')

@section('content_header')
    <h1>
        Relatório de Entrada de Estoque
    </h1>
@stop

@section('content')

    <div class="box">
        <div class="box-body">
            @if ($stocks->isEmpty())
                <div class="alert alert-danger">Nenhum registro foi encontrado!</div>
            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade Requisitada</th>
                            <th>Preço Custo Total</th>
                            <th>Preço Venda Total</th>
                            <th>Data Entrada</th>
                        </tr>
                    </thead>
                    <tbody>   
                        @foreach ($stocks as $stock)
                        <tr>
                            <td>{{ $stock->product->name }}</td>
                            <td>{{ $stock->amount_entry }}</td>
                            <td>R$ {{ $stock->amount_entry * $stock->cost_price }}</td>
                            <td>R$ {{ $stock->amount_entry * $stock->sule_price }}</td>
                            <td>{{ \Carbon\Carbon::parse($stock->date_entry)->format('d/m/Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
            @endif        
        </div>
    </div>
    
    {{-- {{ $stocks->links('pagination::bootstrap-4') }} --}}
@stop