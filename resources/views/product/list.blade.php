@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-3 mb-2 bg-purple text-white">{{ __('Dados do Produto') }}</div>
                    <div class="card-body">
                        @if($produto)

                            <p><b>ID:</b> {{ $produto->id }}</p>
                            <p><b>Nome:</b> {{ $produto->nome }}</p>
                            <p><b>Valor:</b> R${{ number_format($produto->valor,2,",",".") }}</p>
                        @else
                            <p>Produto não encontrado</p>
                        @endif

                        <div class="col-12">
                            <a href="{{ route("product.index")  }}" class="btn btn-primary">Voltar</a>
                            <a href="{{ route("product.edit",['product' => $produto->id]) }}" class="btn btn-info">Editar</a>

                            <form id="form-delete" method="post" action="{{ route("product.destroy",$produto->id) }}">
                                @csrf
                                @method("delete")
                                <a href="javascript:void(0)" onclick="if(confirm('Deseja realmente remover este item?')){ document.getElementById('form-delete').submit() }"
                                   class="btn btn-danger float-right">Remover</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
