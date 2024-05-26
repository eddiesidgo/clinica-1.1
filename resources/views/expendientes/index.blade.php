@extends('layouts/layoutMaster')

@section('title', 'Expedientes')

@section('content')
<h4>Gestión de Expedientes<h4>

@if (Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif

<a href="{{url('/expedientes/create') }}" class="btn btn-primary">Nuevo Expediente</a> <br>

<br>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Genero</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo Electronico</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $paciente)
        <tr>
            <td>{{$paciente->id}}</td>
            <td>{{$paciente->nombre}}</td>
            <td>{{$paciente->genero}}</td>
            <td>{{$paciente->direccion}}</td>
            <td>{{$paciente->telefono}}</td>
            <td>{{$paciente->correo_electronico}}</td>
            <td>
                <a style='font-size: 11px;' href="{{ url('/pacientes/'.$paciente->id.'/edit') }}" class="btn btn-info">Editar</a>
                <br>
                <br>
                <button   style='font-size: 11px;' class="btn btn-danger" onclick="confirmDelete('{{ $paciente->id }}')">Borrar</button>
                <form id="delete-form-{{ $paciente->id }}" action="{{ url('/pacientes/'.$paciente->id) }}" method="POST" style="display: none;">
                    @csrf
                    {{ method_field('DELETE') }}
                </form>
                <br>
                <br>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(pacienteId) {
        Swal.fire({
            title: '¿Deseas borrar?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, borrar',
            cancelButtonText: 'Cancelar',
            background: '#2d2d2d', // Fondo del SweetAlert
            color: '#ffffff', // Color del texto
            iconColor: '#f39c12', // Color del icono
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + pacienteId).submit();
            }
        });
    }
</script>
@endsection
