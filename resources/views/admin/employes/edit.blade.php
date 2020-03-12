@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Editar al empleado {{ $employe->name }}</h2>
            <hr>
            <form action="{{ route('employes.update', $employe->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="">Departamento | Dpto. actual: <strong>{{ $employe->department }}</strong></label>
                    <select name="department" class="form-control" required>
                        <option value="">Elige el departamento</option>
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
                            <option value="{{ $schedule->id }}" selected="{{ ($employe->schedule_id == $schedule->id) ? true : false }}"> {{ $schedule->hour_in   }} a {{ $schedule->hour_out }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="name" value="{{$employe->name}}" class="form-control" placeholder="Nombre del empleado" required>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
