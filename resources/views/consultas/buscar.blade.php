@extends('layouts.layoutMaster')

@section('content')
<div class="container">
    <h1>Buscar Historial de Consultas</h1>
    @role('doctor')
    <a href="{{ route('consultas.index') }}" class="btn btn-success">Regresar</a>
    @endrole
    <form action="{{ route('consultas.buscar.resultado') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Paciente:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    @if (session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
</div>
@endsection
