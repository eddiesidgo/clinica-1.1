@extends('layouts/layoutMaster')
@section('title', 'Recetas')
@section('content')
<head>
    <!--Mi CDN de Alert Sweet-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<!--Título-->
<h4>Receta médica</h4>
<!--If para mostrar mensaje de alerta-->
@if (Session::has('mensaje'))
    <div class="alert alert-success">
        {{ Session::get('mensaje') }}
    </div>
@endif
<!--Botón de Agregar receta, está anclado a create de recetas-->
<div class="mb-3">
<a href="{{ url('/Recetas/create') }}" class="btn btn-info">+ Registrar receta</a>
</div>
<!--Encabezado de mi tabla-->
<table class="table">
    <thead>
        <tr>
            <!--Encabezados de columnas-->
            <th>DUI</th>
            <th>Nombre</th>
            <th>Correo electrónico</th>
            <th>Receta</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <!--Un foreach para redireccionar la información ingresada-->
    <tbody>
        @foreach($Recetas as $Receta)
        <tr>
            <td>{{ $Receta->DUI }}</td>
            <td>{{ $Receta->Paciente }}</td>
            <td>{{ $Receta->correo_electronico }}</td>
            <td>{{ $Receta->Receta }}</td>
            <td>
                <!--Botones de Eliminar,PDF & Enviar-->
                <a style="font-size: 8px; margin-bottom: 1mm;" href="{{ url('/recetas/'.$Receta->id.'/pdf') }}" class="btn btn-danger d-block PDF-button" target="_blank">PDF</a>
                <a style="font-size: 8px; margin-bottom: 1mm;" href="{{ url('/Recetas/'.$Receta->id.'/enviar') }}" class="btn btn-success d-block">Enviar</a>
                <form class="delete-form" action="{{ url('/Recetas/'.$Receta->id) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <a  style="font-size: 8px; margin-bottom: 1mm;" class="btn btn-warning d-block delete-button">Eliminar</a>
                </form>
            </td>
        </tr>
        <!--Termina el foreach-->
        @endforeach
    </tbody>
</table>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Selecciona todos los botones de eliminar
    const deleteButtons = document.querySelectorAll('.delete-button');   
    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Evita el envío inmediato del formulario
            const form = this.closest('form');
            Swal.fire({
                title: '¿Deseas borrar?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#DC3545',
                confirmButtonText: 'Sí, borrar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); 
                }
            });
        });
    });
});
</script>
@endsection
