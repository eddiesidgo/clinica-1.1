@extends('layouts/layoutMaster')

@section('title', 'Pacientes')

@section('content')
<head>
    <!--Mi CDN de Alert Sweet-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<h4>Gestionar Pacientes</h4>

@if (Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif
<div class="mb-3">
<a href="{{url('/pacientes/create') }}" class="btn btn-info">+ Nuevo Paciente</a> <br>
</div>
<table class="table">
    <thead>
        <tr>
            <th>DUI</th>
            <th>Nombre</th>
            <th>Género</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo Electrónico</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $paciente)
        <tr>
            <td>{{$paciente->DUI}}</td>
            <td>{{$paciente->nombre}}</td>
            <td>{{$paciente->genero}}</td>
            <td>{{$paciente->direccion}}</td>
            <td>{{$paciente->telefono}}</td>
            <td>{{$paciente->correo_electronico}}</td>
            <td>
                <a style="font-size: 8px; margin-bottom: 1mm;" href="{{ url('/pacientes/'.$paciente->id.'/edit') }}" class="btn btn-warning">Editar</a>
                <button  style="font-size: 8px; margin-bottom: 1mm;" class="btn btn-danger" onclick="confirmDelete('{{ $paciente->id }}')">Borrar</button>
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
<script>
    function confirmDelete(pacienteId) {
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
                document.getElementById('delete-form-' + pacienteId).submit();
            }
        });
    }
</script>
@endsection
