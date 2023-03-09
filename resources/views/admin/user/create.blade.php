@extends('adminlte::page')

@section('title', 'Novo Usuario')

@section('content_header')
    <h1>Novo Usuario</h1>
@stop

@section('content')

<div class="box">
    <div class="box-body">
        <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="post">
            {!! csrf_field() !!}

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nome Completo</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nome Completo" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Senha</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="Senha" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Senha Novamente</label>
                <div class="col-sm-10">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Senha Novamente" required>
                </div>
            </div>

            <div class="box-footer row">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

@stop