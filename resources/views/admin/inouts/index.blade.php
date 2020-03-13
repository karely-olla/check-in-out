@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Entradas y Salidas de Empleado</a></h2>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Departamento</th>
                        <th>Nombre</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inouts as $inout)
                        <tr>
                            <td>{{ $inout->employe->department }}</td>
                            <td>{{ $inout->employe->name }}</td>
                            <td>{{ $inout->hour_in }}</td>
                            <td>{{ $inout->hour_out }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
