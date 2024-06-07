@extends('layouts.layoutMaster')

@section('title', 'Expedientes')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<h4>Gestionar Expedientes</h4>

@if (Session::has('mensaje'))
    <div class="alert alert-success">
        {{ Session::get('mensaje') }}
    </div>
@endif

@role('secre')
<a href="{{ url('/expedientes/create') }}" class="btn btn-primary">Crear Expediente</a>
@endrole

@role('doctor')
<a href="{{ route('consultas.index') }}" class="btn btn-primary">Consultas</a>
@endrole

<br><br>
<table class="table" id="table">
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
                    @role('secre')
                    <a style='font-size: 11px;' href="{{ url('/expedientes/'.$expediente->idExp.'/edit') }}" class="btn btn-info">Editar</a>
                    <br>
                    <br>
                    <button style="font-size: 11px;" class="btn btn-danger" onclick="confirmDelete('{{ $expediente->idExp }}')">Borrar</button>
                    @endrole
                    
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
    $(document).ready(function() {
    let table = new DataTable('#table');
    $('#table').DataTable();
});
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
