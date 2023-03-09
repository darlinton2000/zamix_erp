@extends('adminlte::page')

@section('title', 'Novo Produto')

@section('content_header')
    <h1>Novo Produto</h1>
@stop

@section('content')

<div class="box">
    <div class="box-body">
        <form action="{{ route('products.store') }}" method="post">
            {!! csrf_field() !!}

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Nome do Produto" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="cost_price" class="col-sm-2 col-form-label">Preço de Custo</label>
                <div class="col-sm-10">
                    <input type="number" name="cost_price" class="form-control" step="0.01" placeholder="Preço de Custo, Ex: 6.70" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="sule_price" class="col-sm-2 col-form-label">Preço de Venda</label>
                <div class="col-sm-10">
                    <input type="number" name="sule_price" class="form-control" step="0.01" placeholder="Preço de Venda, Ex: 3.02" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="amount" class="col-sm-2 col-form-label">Quantidade</label>
                <div class="col-sm-10">
                    <input type="number" name="amount" class="form-control" placeholder="Quantidade, Ex: 30" required>
                </div>
            </div>

            <div class="box-footer row">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

@stop