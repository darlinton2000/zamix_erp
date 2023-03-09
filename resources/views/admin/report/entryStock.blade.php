@extends('adminlte::page')

@section('title', 'Relatório Entrada de Estoque')

@section('content_header')
    <h1>Relatório Entrada de Estoque</h1>
@stop

@section('content')

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error')}}
            </div>
        @endif

        <div class="box box-info">
            <form action="{{ route('search.entry.stock') }}" method="post" class="form-horizontal">
                {!! csrf_field() !!}

                <div class="box-body">
                    <div class="form-group">
                        <label for="date_entry" class="col-sm-2 control-label">Data Inicial</label>
                        <div class="col-sm-10">
                            <input type="date" name="date_entry1" class="form-control" placeholder="Data Inicial" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_entry" class="col-sm-2 control-label">Data Final</label>
                        <div class="col-sm-10">
                            <input type="date" name="date_entry2" class="form-control" placeholder="Data Final" required>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Buscar</button>
                    <a href="{{ url()->previous() }}" class="btn btn-default pull-right">Voltar</a>
                </div>
            </form>
        </div>

    @stop
