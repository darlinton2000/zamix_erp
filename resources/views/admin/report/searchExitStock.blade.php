@extends('adminlte::page')

@section('title', 'Relatório de Saida do Estoque')

@section('content_header')
    <h1>
        Relatório de Saida do Estoque
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
                            <th>Quantidade Retirada do Estoque</th>
                            <th>Preço Custo Total</th>
                            <th>Data Saida</th>
                        </tr>
                    </thead>
                    <tbody>   
                        @foreach ($stocks as $stock)
                        <tr>
                            <td>{{ $stock->product->name }}</td>
                            <td>{{ $stock->amount_exit }}</td>
                            <td>R$ {{ $stock->amount_entry * $stock->cost_price }}</td>
                            <td>{{ \Carbon\Carbon::parse($stock->date_exit)->format('d/m/Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
            @endif        
        </div>
    </div>
    
    {{-- {{ $stocks->links('pagination::bootstrap-4') }} --}}
@stop