@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
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

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="box">
        <div class="box-body">
            <form action="{{ route('users.update', ['id' => $user->id]) }}) }}" enctype="multipart/form-data" method="post">
                {!! csrf_field() !!}

                <div class="form-group">
                    @if ($user->image)
                        <img class="img-circle" src="{{ url("storage/$user->image") }}" alt="{{ $user->name }}"
                            width="80" height="80">
                    @else
                        <img class="img-circle" src="{{ url('/user_default.png') }}" alt="{{ $user->name }}"
                            width="80" height="80">
                    @endif
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                            placeholder="Nome Completo" required>
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
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                            placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Senha">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Senha Novamente</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Senha Novamente">
                    </div>
                </div>

                <div class="box-footer row">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </form>
        </div>
    </div>

@stop
