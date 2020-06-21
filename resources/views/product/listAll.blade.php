@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-12 text-right mb-3">
            <a href="{{ route("product.create") }}" class="btn btn-success">Novo</a>
        </div>
        <div class="col-12">
            @if(count($produtos))
                <table id="tabela" class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th class="text-right">Valor</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos AS $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td class="text-right">R$ {{ number_format($produto->valor,2,",",".") }}</td>
                            {{--                        <td><a href="" title="Ver"><i class="fas fa-eye"></i></a></td>--}}
                            {{--                        <td><a href="" title="Editar"><i class="fas fa-pen"></i></a></td>--}}
                            {{--                        <td><a href="" title="Remover"><i class="fas fa-trash"></i></a></td>--}}
                            <td class="text-center"><a href="{{ route("product.show",$produto->id) }}" title="Ver">Ver</a></td>
                            <td class="text-center"><a href="{{ route("product.edit",$produto->id)  }}" title="Editar">Editar</a></td>
                            <td class="text-center">
                                <form id="form-delete" action="{{ route("product.destroy",['product' => $produto->id]) }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <a href="javascript:void(0)" onclick="document.getElementById('form-delete').submit()">Remover</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>Nenhum produto cadastrado</p>
            @endif
        </div>
    </div>

@endsection
