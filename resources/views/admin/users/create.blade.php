@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Crear nuevo usuario</h2>
            <hr>
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nombre del usuario" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Correo" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-success">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection
