@extends('layouts/layoutMaster')
@section('title', 'Citas')
@section('content')
<style>
.container {
    display: flex;
    justify-content:right;
}
/*Tamaño de input tipo text*/
.form-control{
    width: 100%;
}
</style>

<div class="mb-3">
    <h4>Nueva Cita:</h4>
</div>
<form action="{{ url('/events') }}" method="POST" class="mb-3">
    @csrf
    <div class="container">
        <div class="mb-3">
            <label>Buscar:</label>
            <input class="form-control" type="text" id="buscar" placeholder="Buscar el paciente" list="pacientesList">
            <datalist id="pacientesList">
                @foreach($dat as $paciente)
                    <option value="{{ $paciente->nombre }}" data-id="{{ $paciente->id }}" data-dui="{{ $paciente->DUI }}"></option>
                @endforeach
            </datalist>
        </div>
    </div> 
    <div class="mb-3">
        <label for="DUI" class="form-label">Documento Único de Identidad</label>
        <input type="text" class="form-control" name="DUI" id="DUI"/>
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Paciente</label>
        <input type="text" class="form-control" name="nombre" id="nombre"/>
    </div>
    <div class="mb-3">
        <label for="event" class="form-label">Asunto</label>
        <input type="text" class="form-control" name="event" id="event"/>
    </div>
    <div class="mb-3">
        <label for="start_date" class="form-label">Fecha de inicio</label>
        <input type="datetime-local" class="form-control" name="start_date" id="start_date" /> 
    </div>        
    <div class="mb-3">
        <label for="end_date" class="form-label">Fecha de finalización</label>
        <input type="datetime-local" class="form-control" name="end_date" id="end_date"/>
    </div>
    <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Guardar"/>
        <a href="{{url('/events')}}" class="btn btn-dark">Cancelar</a>
    </div>
</form>
<script>
     document.getElementById('buscar').addEventListener('input', function() {
        var input = this;
        var list = input.getAttribute('list');
        var options = document.querySelectorAll('#' + list + ' option');
        var inputValue = input.value;

        // Encontrar el option seleccionado
        for(var i = 0; i < options.length; i++) {
            var option = options[i];
            if(option.value === inputValue) {
                // Obtener los datos del paciente
                var dui = option.getAttribute('data-dui');
                var nombre = option.value;

                // Asignar los valores a los campos correspondientes
                document.getElementById('DUI').value = dui;
                document.getElementById('nombre').value = nombre;
                break;
            }
        }
    });
    </script>
@endsection