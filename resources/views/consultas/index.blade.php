@extends('layouts.layoutMaster')

@section('title', 'Consultas')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<h4>Gestionar Consultas</h4>

@if (Session::has('mensaje'))
    <div class="alert alert-success">
        {{ Session::get('mensaje') }}
    </div>
@endif

@role('secre')
<a href="{{ url('/consultas/create') }}" class="btn btn-primary">Crear Consulta</a>
@endrole
<a href="{{url('/events/show') }}" class="btn btn-primary">Lista de Consultas</a>

<a href="{{ route('consultas.buscar') }}"class="btn btn-warning">Buscar Historial</a>



<br><br>
<table class="table" id="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Fecha de la Consulta</th>
            <th>Diagnóstico</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($consultas as $consulta)
        <tr>
            <td>{{ $consulta->idConsulta }}</td>
            <td>{{ $consulta->event->start_date }}</td>
            <td>{{ $consulta->diagnostico }}</td>
            <td>{{ $consulta->estado }}</td>
            <td>
                <div class="btn-group" role="group">
                <a href="{{ route('consultas.edit', ['consulta' => $consulta->idConsulta]) }}" class="btn btn-info" id="editar-{{ $consulta->idConsulta }}">Editar</a>
                @role('doctor')
                <a href="{{ route('recetas.index') }}" class="btn btn-success">Receta</a>
                @endrole
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    function ConfirmarEliminar(id) {
    Swal.fire({
        title: '¿Deseas borrar?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#198754',
        cancelButtonColor: '#DC3545',
        confirmButtonText: 'Sí, borrar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}

    $(document).ready(function() {
    let table = new DataTable('#table');
    $('#table').DataTable();
});
</script>
@endsection
