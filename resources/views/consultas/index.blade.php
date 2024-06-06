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
<a href="{{route('consultas.pdf')}}" class="btn btn-success" target="_blank">Reporte Consultas</a>

<a href="{{ route('historial.index') }}" class="btn btn-success">Reporte Historial Consultas</a>

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
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function() {
    let table = new DataTable('#table');
    $('#table').DataTable();
});
</script>
@endsection
