@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Crear nuevo horario</h2>
            <hr>
            <form action="{{ route('schedules.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="time" name="hour_in" class="form-control" placeholder="Hora de entrada" required>
                </div>
                <div class="form-group">
                    <input type="time" name="hour_out" class="form-control" placeholder="Hora de salida" required>
                </div>
                <button type="submit" class="btn btn-success">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection
