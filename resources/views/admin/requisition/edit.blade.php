@extends('adminlte::page')

@section('title', 'Editar Requisicao')

@section('content_header')
    <h1>Editar Requisição</h1>
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
            <form action="{{ route('requisitions.update', ['id' => $requisition->id]) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nome do Funcionário</label>
                    <div class="col-sm-10">
                        <select name="user_id" class="form-control">
                            <option hidden="true">Selecione uma opção</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" @if($requisition->user_id === $user->id) selected @endif>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cost_price" class="col-sm-2 col-form-label">Produto</label>
                    <div class="col-sm-10">
                        <select name="product_id" class="form-control">
                            <option hidden="true">Selecione uma opção</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" @if($requisition->product_id === $product->id) selected @endif>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amount" class="col-sm-2 col-form-label">Quantidade</label>
                    <div class="col-sm-10">
                        <input type="text" name="amount" class="form-control" value="{{ $requisition->amount }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amount" class="col-sm-2 col-form-label">Data da Retirada</label>
                    <div class="col-sm-10">
                        <input type="date" name="withdrawal_date" class="form-control" value="{{ $requisition->withdrawal_date }}" required>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </form>
        </div>
    </div>

@stop
