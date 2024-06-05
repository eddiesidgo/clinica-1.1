@extends('layouts.layoutMaster')

@section('title', 'Consultas')

@section('content')
<h4>Gestionar Consultas</h4>

@if (Session::has('mensaje'))
    <div class="alert alert-success">
        {{ Session::get('mensaje') }}
    </div>
@endif

<a href="{{ url('/consultas/create') }}" class="btn btn-primary">Crear Consulta</a>
<a href="{{route('consultas.pdf')}}" class="btn btn-success">Reporte Consultas</a>
<br><br>
<table class="table">
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
@endsection
