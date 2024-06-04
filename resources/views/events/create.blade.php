@extends('layouts/layoutMaster')
@section('title', 'Citas')
@section('content')

<h4>Nueva cita:</h4>

<form action="{{ url('/events') }}" method="POST" class="mb-3">
    @csrf
<div class="mb-3">
        <label for="Paciente" class="form-label">Documento Único de Identidad:</label>
        <select class="form-control" name="DUI" id="DUI">   
@foreach($dat as $paciente)
<option value="{{ $paciente->DUI }}" {{ isset($events) && $events->DUI == $paciente->DUI ? 'selected' : '' }}>{{ $paciente->DUI }}
</option>
 @endforeach           
</select>
</div>
<div class="mb-3">
<label for="Paciente" class="form-label">Paciente:</label>
<select class="form-control" name="id_Paciente" id="id_Paciente">
@foreach($dat as $paciente)
<option value="{{ $paciente->id }}" {{ isset($events) && $events->id_Paciente == $paciente->id ? 'selected' : '' }}>{{ $paciente->nombre }}
</option>
@endforeach</select>
</div>
<div class="mb-3">
        <label for="Asunto" class="form-label">Asunto</label>
        <input
            type="text"
            class="form-control"
            name="event"
            id="event"
            placeholder=""/> 
</div>
<div class="mb-3">
        <label for="FechaDeInicio" class="form-label">Fecha De Incio</label>
        <input
            type="datetime-local"
            class="form-control"
            name="start_date"
            id="start_date"
            value=""
            placeholder=""/> 
</div>
<div class="mb-3">
        <label for="FechaDeFinalizacion" class="form-label">Fecha De Finalizacion</label>
        <input
            type="datetime-local"
            class="form-control"
            name="end_date"
            id="end_date"
            value=""
            placeholder=""/> 
</div>
<div class="mb-3">
        <input
        class="btn btn-primary"
        type="submit"
        value="Guardar Datos" />

    <a href="{{url('/events') }}" class="btn btn-dark">Cancelar</a>
</div>
</form>
@endsection