@extends('layouts.layoutMaster')

@section('content')
<div class="container">


    <h1>Historial de Consultas de {{ $paciente->nombre }}</h1>
    <a href="{{ route('consultas.index') }}" class="btn btn-success">Ir a Consultas</a>
    <a href="{{ route('consultas.buscar') }}"class="btn btn-warning">Buscar Historial</a>
    <br>
    @if($consultas->isEmpty())
        <p>No se encontraron consultas para este paciente.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Diagnóstico</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->idConsulta }}</td>
                        <td>{{ $consulta->diagnostico }}</td>
                        <td>{{ $consulta->estado }}</td>
                        <td>{{ $consulta->event->start_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <form action="{{ route('consultas.historial') }}" method="POST">
        @csrf
        <input type="hidden" name="nombre" value="{{ $paciente->nombre }}">
        <button type="submit" target="_blank" class="btn btn-primary">Generar PDF</button>
    </form>
</div>
@endsection
