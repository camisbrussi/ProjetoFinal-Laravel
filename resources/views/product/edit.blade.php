@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($errors->all())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="card">
                    <div class="card-header p-3 mb-2 bg-purple text-white">{{ __('Editar Produto') }}</div>
                    <div class="card-body">
                    <form action="{{ route("product.update",['product' => $produto->id]) }}" method="post">
                        @csrf
                        @method("put")
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label for="nome">Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control"
                                           value="{{ $produto->nome }}">
                                </div>

                                <div class="col-md-4">
                                    <label for="valor">Valor (R$)</label>
                                    <input type="text" name="valor" id="valor" class="form-control valor"
                                           value="{{ number_format($produto->valor,2,",",".") }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <a href="{{ route("product.index")  }}" class="btn btn-primary">Voltar</a>
                                    <input type="submit" class="btn btn-success float-right" value="Salvar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
