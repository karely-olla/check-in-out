@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Empleados <a href="{{ route('employes.create') }}" class="btn btn-primary">Crear empleado</a></h2>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Departamento</th>
                        <th>Nombre</th>
                        <th>Horario</th>
                        <th>Clave</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employes as $employe)
                        <tr>
                            <td>{{ $employe->department }}</td>
                            <td>{{ $employe->name }}</td>
                            <td>{{ $employe->schedule->hour_in }} a {{ $employe->schedule->hour_out }}</td>
                            <td>{{ $employe->key }}</td>
                            <td>
                                <a href="{{ route('employes.edit', $employe->id) }}" class="btn btn-warning">Editar</a>
                                <a href="#" class="btn btn-danger" onclick="event.preventDefault();
                                    document.getElementById('delete-employe').submit();">Eliminar</a>
                                <form id="delete-employe" action="{{ route('employes.destroy', $employe->id) }}" method="post" style="display:none;">
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
