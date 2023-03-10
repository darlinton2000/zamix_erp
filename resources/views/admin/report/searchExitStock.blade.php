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
                <table id="datatable" class="table table-hover">
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "oLanguage": {
                    "sLengthMenu": "Mostrar _MENU_ registros por página",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registro(s)",
                    "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "sInfoFiltered": "(filtrado de _MAX_ registros)",
                    "sSearch": "Pesquisar: ",
                    "oPaginate": {
                        "sFirst": "Início",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",
                        "sLast": "Último"
                    }
                },
                responsive: true
            });
        });
    </script>
@stop