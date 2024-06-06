@extends('layouts.layoutMaster')

@section('title', 'Buscar Historial')

@section('content')

<h4>Historial de Consultas</h4>

<form action="{{ url('/historial') }}" method="post" class="mb-3">
    @csrf <!-- Agregamos el token de verificación CSRF -->
    <h5 class="card-title">Buscar Consultas por nombre</h5>
    <div class="form-group">
    <label for="nombre_paciente" class="form-label">Nombre del Paciente:</label>
<input type="text" class="form-control" name="nombre_paciente" id="nombre_paciente" value="{{ isset($historial)? $historial->paciente->nombre : '' }}" >
    </div>
    <br>

    

</form>

@endsection