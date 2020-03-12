@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Horarios <a href="{{ route('schedules.create') }}" class="btn btn-primary">Crear horario</a></h2>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Hora de Entrada</th>
                        <th>Hora de salida</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->hour_in }}</td>
                            <td>{{ $schedule->hour_out }}</td>
                            <td>
                                <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning">Editar</a>
                                <a href="#" class="btn btn-danger" onclick="event.preventDefault();
                                    document.getElementById('delete-schedule').submit();">Eliminar</a>
                                <form id="delete-schedule" action="{{ route('schedules.destroy', $schedule->id) }}" method="post" style="display:none;">
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
