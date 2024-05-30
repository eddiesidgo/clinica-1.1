@extends('layouts.layoutMaster')

@section('title', 'Expedientes')

@section('content')
<h4>Gestionar Expedientes</h4>

@if (Session::has('mensaje'))
    <div class="alert alert-success">
        {{ Session::get('mensaje') }}
    </div>
@endif

<a href="{{ url('/expedientes/create') }}" class="btn btn-primary">Crear Expediente</a>
<br><br>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre del Paciente</th>
            <th>Antecedentes</th>
            <th>Alergias</th>
            <th>Medicamentos</th>
            <th>Historial Quirúrgico</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($expedientes as $expediente)
            <tr>
                <td>{{ $expediente->idExp }}</td>
                <td>{{ $expediente->paciente->nombre }}</td>
                <td>{{ $expediente->antecedentes }}</td>
                <td>{{ $expediente->alergias }}</td>
                <td>{{ $expediente->medicamento }}</td>
                <td>{{ $expediente->histquirurgico }}</td>
                <td>
                    <br><br>
                    <a style='font-size: 11px;' href="{{ url('/expedientes/'.$expediente->idExp.'/edit') }}" class="btn btn-info">Editar</a>
                    <br>
                    <br>
                    <button style="font-size: 11px;" class="btn btn-danger" onclick="confirmDelete('{{ $expediente->idExp }}')">Borrar</button>
                    <form id="delete-form-{{ $expediente->idExp }}" action="{{ url('/expedientes/' . $expediente->idExp) }}" method="POST" style="display: none;">
                        @csrf
                        {{ method_field('DELETE') }}
                    </form>
                    <br><br>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(expedienteId) {
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
                document.getElementById('delete-form-' + expedienteId).submit();
            }
        });
    }
</script>
@endsection
