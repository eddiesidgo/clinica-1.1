@extends('layouts.layoutMaster')
@section('title', 'Crear Expediente')
@section('content')

<div class="mb-3">
    <h4>Formulario para crear un nuevo expediente</h4>
</div>

<!-- Campo de búsqueda en el lado superior derecho -->
<div class="d-flex justify-content-end mb-3">
    <input type="text" class="form-control w-25" id="searchPaciente" list="pacienteList" placeholder="Buscar por DUI">
    <datalist id="pacienteList">
        @foreach($dat as $paciente)
            <option data-id="{{ $paciente->id }}" data-nombre="{{ $paciente->nombre }}" value="{{ $paciente->DUI }}"></option>
        @endforeach
    </datalist>
</div>

<form action="{{ url('/expedientes') }}" method="post" class="mb-3">
    @csrf

    <!-- Campo de DUI (solo informativo) -->
    <div class="mb-3">
        <label for="DUI" class="form-label">Documento Único de Identidad:</label>
        <input type="text" class="form-control" id="DUI" readonly>
    </div>

    <!-- Campo de nombre del Paciente (solo informativo) -->
    <div class="mb-3">
        <label for="nombre_Paciente" class="form-label">Nombre del Paciente:</label>
        <input type="text" class="form-control" id="nombre_Paciente" readonly>
    </div>

    <!-- Campo oculto para el ID del paciente -->
    <input type="hidden" name="id_Paciente" id="id_Paciente">

    <!-- Resto de los campos del expediente -->
    <div class="mb-3">
        <label for="antecedentes" class="form-label">Antecedentes:</label>
        <textarea class="form-control" name="antecedentes" id="antecedentes" rows="3">{{ old('antecedentes', $expediente->antecedentes ?? '') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="alergias" class="form-label">Alergías:</label>
        <textarea class="form-control" name="alergias" id="alergias" rows="3">{{ old('alergias', $expediente->alergias ?? '') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="medicamento" class="form-label">Medicamentos:</label>
        <textarea class="form-control" name="medicamento" id="medicamento" rows="3">{{ old('medicamento', $expediente->medicamento ?? '') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="histquirurgico" class="form-label">Historial Quirúrgico:</label>
        <textarea class="form-control" name="histquirurgico" id="histquirurgico">{{ old('histquirurgico', $expediente->histquirurgico ?? '') }}</textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ url('/expedientes') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>

<script>
    document.getElementById('searchPaciente').addEventListener('input', function() {
        var input = this.value;
        var list = document.getElementById('pacienteList').options;
        for (var i = 0; i < list.length; i++) {
            if (list[i].value === input) {
                document.getElementById('id_Paciente').value = list[i].dataset.id;
                document.getElementById('nombre_Paciente').value = list[i].dataset.nombre;
                document.getElementById('DUI').value = list[i].value;
                break;
            }
        }
    });

    // Desactivar la edición del campo de búsqueda una vez seleccionado el DUI
    document.getElementById('searchPaciente').addEventListener('change', function() {
        this.setAttribute('readonly', true);
    });
</script>
@endsection
