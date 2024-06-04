@extends('layouts/layoutMaster')

@section('title', 'Citas')

@section('content')

<h4>Crear Nueva Cita:</h4>

<form action="{{ url('/events') }}" method="POST" class="mb-3">
    @csrf

    <!-- Aqui el select llama el nombre del paciente -->
    <div class="form-group">
        <label for="Paciente" class="form-label">Seleccione el Paciente:</label>
        <select class="form-control" name="id_Paciente" id="id_Paciente">
            
            @foreach($dat as $paciente)
            <option value="{{ $paciente->id }}" {{ isset($events) && $events->id_Paciente == $paciente->id ? 'selected' : '' }}>
                {{ $paciente->nombre }}
            </option>
        @endforeach
            
        </select>
    </div>
   

        <label for="Asunto" class="form-label">Asunto</label>
        <input
            type="text"
            class="form-control"
            name="event"
            id="event"
            placeholder=""
        /> <br>

        <label for="FechaDeInicio" class="form-label">Fecha De Incio</label>
        <input
            type="datetime-local"
            class="form-control"
            name="start_date"
            id="start_date"
            value=""
            placeholder=""
        /> <br>

        <label for="FechaDeFinalizacion" class="form-label">Fecha De Finalizacion</label>
        <input
            type="datetime-local"
            class="form-control"
            name="end_date"
            id="end_date"
            value=""
            placeholder=""
        /> <br>


        <input
        class="btn btn-primary"
        type="submit"
        value="Guardar Datos"
    />

    <a href="{{url('/events') }}" class="btn btn-dark">Regresar</a> <br>
        

</form>

@endsection