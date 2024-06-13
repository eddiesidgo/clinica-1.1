@extends('layouts/layoutMaster')
@section('title', 'Citas')
@section('content')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<h4>Comprobantes</h4>

@if (Session::has('mensaje'))
    <div class="alert alert-success">
        {{ Session::get('mensaje') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Documento Único de Identidad</th>
            <th>Nombre</th>
            <th>Asunto</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Finalizacion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $event)    
        <tr>
            <td>{{$event->DUI}}</td>
            <td scope="row">{{$event->nombre}}</td>
            <td>{{$event->event}}</td>
            <td>{{$event->start_date}}</td>
            <td>{{$event->end_date}}</td>
            <td>
                <a style="font-size: 8px; margin-bottom: 1mm;" href="{{ url('/events/'.$event->id.'/ComprobantePDF') }}" class="btn btn-danger d-block" target="_blank">Comprobante</a>            </td> 
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mb-3">
<a href="{{url('/consultas') }}" class="btn btn-secondary">Cancelar</a>

</div>
<script>
    
$(document).ready(function() {
    let table = new DataTable('#table');
    $('#table').DataTable();
});
</script>
@endsection
