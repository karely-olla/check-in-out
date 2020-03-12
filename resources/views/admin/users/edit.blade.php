@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Editar al usuario {{ $user->name }}</h2>
            <hr>
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Nombre del usuario" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Correo" required>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
