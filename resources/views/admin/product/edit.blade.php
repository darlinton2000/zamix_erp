@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')
    <h1>Editar Produto</h1>
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
            <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}"
                            placeholder="Nome do Produto" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cost_price" class="col-sm-2 col-form-label">Preço de Custo</label>
                    <div class="col-sm-10">
                        <input type="text" name="cost_price" class="form-control" step="0.01"
                            value="{{ $product->cost_price }}" placeholder="Preço de Custo, Ex: 6.70" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sule_price" class="col-sm-2 col-form-label">Preço de Venda</label>
                    <div class="col-sm-10">
                        <input type="text" name="sule_price" class="form-control" step="0.01"
                            value="{{ $product->sule_price }}" placeholder="Preço de Venda, Ex: 3.02" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amount" class="col-sm-2 col-form-label">Quantidade</label>
                    <div class="col-sm-10">
                        <input type="text" name="amount" class="form-control" value="{{ $product->amount }}"
                            placeholder="Quantidade, Ex: 30" required>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </form>
        </div>
    </div>

@stop
