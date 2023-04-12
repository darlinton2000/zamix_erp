@extends('adminlte::page')

@section('title', 'Editar Produto no Estoque')

@section('content_header')
    <h1>Editar Produto no Estoque</h1>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <h5><i class="icon fas fa-ban"></i>Ocorreu um errro.</h5>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box">
        <div class="box-body">
            <form action="{{ route('stocks.update', ['id' => $product_stock->id]) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group row">
                    <label for="cost_price" class="col-sm-2 col-form-label">Produto</label>
                    <div class="col-sm-10">
                        <select name="product_id" class="form-control">
                            <option hidden="true">Selecione uma opção</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" @if($product_stock->product_id === $product->id) selected @endif>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amount" class="col-sm-2 col-form-label">Quantidade Entrada</label>
                    <div class="col-sm-10">
                        <input type="text" name="amount_entry" class="form-control" value="{{ $product_stock->amount_entry }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amount" class="col-sm-2 col-form-label">Quantidade Saída</label>
                    <div class="col-sm-10">
                        <input type="text" name="amount_exit" class="form-control" value="{{ $product_stock->amount_exit }}" placeholder="Quantidade Saída, Ex: 30">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cost_price" class="col-sm-2 col-form-label">Preço de Custo</label>
                    <div class="col-sm-10">
                        <input type="text" name="cost_price" class="form-control" step="0.01" value="{{ $product_stock->cost_price }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sule_price" class="col-sm-2 col-form-label">Preço de Venda</label>
                    <div class="col-sm-10">
                        <input type="text" name="sule_price" class="form-control" step="0.01" value="{{ $product_stock->sule_price }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amount" class="col-sm-2 col-form-label">Data Entrada</label>
                    <div class="col-sm-10">
                        <input type="date" name="date_entry" class="form-control" value="{{ $product_stock->date_entry }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amount" class="col-sm-2 col-form-label">Data Saída</label>
                    <div class="col-sm-10">
                        <input type="date" name="date_exit" class="form-control" value="{{ $product_stock->date_exit }}">
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </form>
        </div>
    </div>

@stop
