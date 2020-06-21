@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">
            @if($produto)
                <h1>Dados do produto</h1>
                <p><b>ID:</b> {{ $produto->id }}</p>
                <p><b>Nome:</b> {{ $produto->nome }}</p>
                <p><b>Valor:</b> R${{ number_format($produto->valor,2,",",".") }}</p>
            @else
                <p>Produto não encontrado</p>
            @endif
        </div>
        <div class="col-12">
            <a href="{{ route("product.index")  }}" class="btn btn-primary">Listar</a>
            <a href="{{ route("product.edit",['product' => $produto->id]) }}" class="btn btn-info">Editar</a>
            <form id="form-delete" method="post" action="{{ route("product.destroy",$produto->id) }}">
                @csrf
                @method("delete")
                <a href="javascript:void(0)" onclick="document.getElementById('form-delete').submit()" class="btn btn-danger float-right">Remover</a>
            </form>
        </div>
    </div>
@endsection
