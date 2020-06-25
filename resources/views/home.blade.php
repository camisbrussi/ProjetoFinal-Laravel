@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <link rel="stylesheet" href="{{ asset('site/style.css') }}">
                <div class="card-header p-3 mb-2 bg-purple text-white">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Você está logado
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
