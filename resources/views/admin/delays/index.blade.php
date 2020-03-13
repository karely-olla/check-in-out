@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Retardos de Empleado</a></h2>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Departamento</th>
                        <th>Nombre</th>
                        <th>Minutos</th>
                        <th>Dia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($delays as $delay)
                        <tr>
                            <td>{{ $delay->employe->department }}</td>
                            <td>{{ $delay->employe->name }}</td>
                            <td>{{ $delay->minutes }}</td>
                            <td>{{ $delay->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
