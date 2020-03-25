@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 pt-5 mt-5 col-md-4">
                @if (session('message'))
                    <div id="message-check" class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ route('inouts.store') }}" method="post">
                    @csrf
                    <input type="password" autofocus name="key" class="form-control form-control-lg" placeholder="Coloca tu clave para checar" required>
                    <a href="{{ route('login') }}">Acceder como administrador</a>
                </form>
            </div>
        </div>
    </div>

@endsection
