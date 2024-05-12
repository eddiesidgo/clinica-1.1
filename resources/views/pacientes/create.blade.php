@extends('layouts/layoutMaster')

@section('title', 'Pacientes')

@section('content')
<h4>Registrar Pacientes: </h4>

<form action="{{ url('/pacientes') }}" method="POST" class="mb-3">
    @csrf
    <label for="Nombre" class="form-label">Nombre</label>
    <input
        type="text"
        class="form-control"
        name="Nombre"
        id="Nombre"
        placeholder=""
    />

    <label for="Genero" class="form-label">Genero</label>
    <input
        type="text"
        class="form-control"
        name="Genero"
        id="Genero"
        placeholder=""
    />

    <label for="Direccion" class="form-label">Direccion</label>
    <input
        type="text"
        class="form-control"
        name="Direccion"
        id="Direccion"
        placeholder=""
    />

    <label for="Telefono" class="form-label">Telefono</label>
    <input
        type="text"
        class="form-control"
        name="Telefono"
        id="Telefono"
        placeholder=""
    />

    <label for="correo_electronico" class="form-label">Correo Electronico</label>
    <input
        type="text"
        class="form-control"
        name="correo_electronico"
        id="correo_electronico"
        placeholder=""
    /> <br>

    <input
        class="btn btn-primary"
        type="submit"
        value="Guardar Datos"
    />
    
</form>


@endsection