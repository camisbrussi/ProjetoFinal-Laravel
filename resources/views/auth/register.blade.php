@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cadastrar Usuário') }}</div>
                    @if($errors->all())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-8">{{ __('Nome') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control value="{{ old('name') }}
                                    "@error('name') is-invalid @enderror" name="name" required autocomplete="name"
                                    autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-8">{{ __('E-Mail') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-6">{{ __('Senha') }}</label>

                                <label for="password-confirm"
                                       class="col-md-6">{{ __('Confirmar Senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="new-password">
                                </div>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password_confirmation">
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <a href="{{ route("user.index")  }}" class="btn btn-primary">Voltar</a>
                                    <input type="submit" class="btn btn-success float-right" value="Salvar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
