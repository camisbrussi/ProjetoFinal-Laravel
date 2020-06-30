@extends('layouts.app')
@section('content')
        <div class="container">
        <div class="col-12 text-right mb-3">
            @if(\Illuminate\Support\Facades\Auth::check())
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
                            <td class="text-center"><a href="{{ route("product.show",$produto->id) }}" title="Ver"><i
                                        class="fas fa-eye"></i></a></td>
                            <td class="text-center"><a href="{{ route("product.edit",$produto->id)  }}"
                                                       title="Editar"><i class="fas fa-pencil-alt"></i></a></td>
                            <td class="text-center">
                                <form id="form-delete-{{$produto->id}}"
                                      action="{{ route("product.destroy",$produto->id) }}" method="post">

                                    @csrf
                                    @method("delete")
                                    <a href="javascript:void(0)"
                                       onclick="document.getElementById('form-delete-{{$produto->id}}').submit()"><i class="fas fa-trash" aria-hidden="true"></i></a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>Nenhum produto cadastrado</p>
            @endif
            @endif
        </div>
    </div>
@endsection
