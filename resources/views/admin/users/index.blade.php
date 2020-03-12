@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Usuarios <a href="{{ route('users.create') }}" class="btn btn-primary">Crear usuario</a></h2>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                                <a href="#" class="btn btn-danger" onclick="event.preventDefault();
                                    document.getElementById('delete-user').submit();">Eliminar</a>
                                <form id="delete-user" action="{{ route('users.destroy', $user->id) }}" method="post" style="display:none;">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
