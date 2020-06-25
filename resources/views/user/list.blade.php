@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
                    <div class="card-header p-3 mb-2 bg-purple text-white">{{ __('Dados do Usuário') }}</div>
                    <div class="card-body">
                        @if($usuario)
                            <p><b>ID:</b> {{ $usuario->id }}</p>
                            <p><b>Nome:</b> {{ $usuario->name }}</p>
                            <p><b>E-mail:</b> {{ $usuario->email }}</p>
                        @else
                            <p>Usuário não encontrado</p>
                        @endif
                            <div class="col-12">
                                <a href="{{ route("user.index")  }}" class="btn btn-primary">Voltar</a>
                                <a href="{{ route("user.edit",['user' => $usuario->id]) }}" class="btn btn-info">Editar</a>

                                <form id="form-delete" method="post" action="{{ route("user.destroy",$usuario->id) }}">
                                    @csrf
                                    @method("delete")
                                    <a href="javascript:void(0)" onclick="document.getElementById('form-delete').submit()"
                                       class="btn btn-danger float-right">Remover</a>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
