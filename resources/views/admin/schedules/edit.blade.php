@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Editar al horario</h2>
            <hr>
            <form action="{{ route('schedules.update', $schedule->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <input type="time" name="hour_in" value="{{ $schedule->hour_in }}" class="form-control" placeholder="Hora de entrada" required>
                </div>
                <div class="form-group">
                    <input type="time" name="hour_out" value="{{ $schedule->hour_out }}" class="form-control" placeholder="Hora de salida" required>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
