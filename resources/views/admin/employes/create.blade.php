@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Crear nuevo empleado</h2>
            <hr>
            <form action="{{ route('employes.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Departamento</label>
                    <select name="department" class="form-control" required>
                        <option value="ventas">Ventas</option>
                        <option value="sistemas">Sistemas</option>
                        <option value="restaurante">Restaurante</option>
                        <option value="recepcion">Recepcion</option>
                        <option value="recursos humanos">Recursos Humanos</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Horario</label>
                    <select name="schedule_id" class="form-control" required>
                        @foreach ($schedules as $schedule)
                            <option value="{{ $schedule->id }}">{{ $schedule->hour_in }} a {{ $schedule->hour_out }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nombre del empleado" required>
                </div>
                <button type="submit" class="btn btn-success">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection
