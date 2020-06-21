@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edição de produtos</h1>

        @if($errors->all())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form action="{{ route("product.update",['product' => $produto->id]) }}" method="post">
            @csrf
            @method("put")

            <div class="form-row mt-3">
                <div class="col-md-8">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ $produto->nome }}">
                </div>

                <div class="col-md-4">
                    <label for="valor">Valor (R$)</label>
                    <input type="text" name="valor" id="valor" class="form-control valor" value="{{ number_format($produto->valor,2,",",".") }}">
                </div>
            </div>

            <div class="form-row mt-3">
                <div class="col-12">
                    <a href="{{ route("product.index")  }}" class="btn btn-primary">Listar</a>
                    <input type="submit" class="btn btn-success float-right" value="Salvar">
                </div>
            </div>
        </form>

    </div>
@endsection
