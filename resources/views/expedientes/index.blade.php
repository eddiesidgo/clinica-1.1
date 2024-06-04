@extends('layouts.layoutMaster')
@section('title', 'Expedientes')
@section('content')

<h4>Gestionar Expedientes</h4>

@if (Session::has('mensaje'))
    <div class="alert alert-success">
        {{ Session::get('mensaje') }}
    </div>
@endif
<div class="mb-3">
<a href="{{ url('/expedientes/create') }}" class="btn btn-info">+ Crear Expediente</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>DUI</th>
            <th>Paciente</th>
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
                <td>{{ $expediente->DUI}}</td>
                <td>{{ $expediente->paciente->nombre }}</td>
                <td>{{ $expediente->antecedentes }}</td>
                <td>{{ $expediente->alergias }}</td>
                <td>{{ $expediente->medicamento }}</td>
                <td>{{ $expediente->histquirurgico }}</td>
                <td>
                    <a  style="font-size: 8px; margin-bottom: 1mm;" href="{{ url('/expedientes/'.$expediente->idExp.'/edit') }}" class="btn btn-Warning">Editar</a>
                    <button  style="font-size: 8px; margin-bottom: 1mm;"class="btn btn-danger" onclick="confirmDelete('{{ $expediente->idExp }}')">Borrar</button>
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
</script>
@endsection
