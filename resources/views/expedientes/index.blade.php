@extends('layouts.layoutMaster')
@section('title', 'Expedientes')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<div class="mb-3">
    <h4>Gestionar Expedientes</h4>
</div>
@if (Session::has('mensaje'))
    <div class="alert alert-success">
        {{ Session::get('mensaje') }}
    </div>
@endif
<div class="mb-3">
    @role('secre')
    <a href="{{ url('/expedientes/create') }}" class="btn btn-primary">Crear Expediente</a>
    @endrole
    @role('doctor')
    <a href="{{ route('consultas.index') }}" class="btn btn-primary">Consultas</a>
    @endrole
</div>

<table class="table" id="table">
    <thead>
        <tr>
            <th>Documento Único de Identidad</th>
            <th>Nombre</th>
            <th>Antecedentes</th>
            <th>Alergías</th>
            <th>Medicamentos</th>
            <th>Historial Quirúrgico</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($expedientes as $expediente)
            <tr>
                <td>{{ $expediente->paciente->DUI }}</td>
                <td>{{ $expediente->paciente->nombre }}</td>
                <td>{{ $expediente->antecedentes }}</td>
                <td>{{ $expediente->alergias }}</td>
                <td>{{ $expediente->medicamento }}</td>
                <td>{{ $expediente->histquirurgico }}</td>
                <td>
                    @role('doctor')
                    <a href="{{ url('/expedientes/'.$expediente->id.'/edit') }}" class="btn btn-info">Editar</a>
                    @endrole
                    <button class="btn btn-danger" onclick="confirmDelete('{{ $expediente->id }}')">Borrar</button>
                    
                    <form id="delete-form-{{ $expediente->id }}" action="{{ url('/expedientes/' . $expediente->id) }}" method="POST" style="display: none;">
                        @csrf
                        {{ method_field('DELETE') }}
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
    {{ $expedientes->links() }}
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(expedienteId) {
        Swal.fire({
            text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#DC3545',
                confirmButtonText: 'Sí, borrar',
                cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + expedienteId).submit();
            }
        });
    }
    $(document).ready(function() {
    let table = new DataTable('#table');
    $('#table').DataTable();
});
</script>
@endsection
