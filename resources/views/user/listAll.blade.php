@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-12 text-right mb-3">
            <a href="{{ route("user.create") }}" class="btn btn-success">Novo</a>
        </div>
        <div class="col-12">
            @if(count($usuarios))
                <table id="tabela" class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios AS $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            {{--                        <td><a href="" title="Ver"><i class="fas fa-eye"></i></a></td>--}}
                            {{--                        <td><a href="" title="Editar"><i class="fas fa-pen"></i></a></td>--}}
                            {{--                        <td><a href="" title="Remover"><i class="fas fa-trash"></i></a></td>--}}
                            <td class="text-center"><a href="{{ route("user.show",$usuario->id) }}" title="Ver"><i class="fas fa-eye"></i></a></td>
                            <td class="text-center"><a href="{{ route("user.edit",$usuario->id)  }}" title="Editar"><i class="fas fa-pencil-alt"></i></a></td>
                            <td class="text-center">
                                <form id="form-delete" action="{{ route("user.destroy",['user' => $usuario->id]) }}" method="post"><i class="fas fa-trash" aria-hidden="true"></i>
                                    @csrf
                                    @method("delete")
                                    <a href="javascript:void(0)" onclick="document.getElementById('form-delete').submit()"></a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>Nenhum usuário cadastrado</p>
            @endif
        </div>
    </div>

@endsection
