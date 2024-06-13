@extends('layouts/layoutMaster')
@section('title', 'Citas')
@section('content')
<!-- Las CDN de Sweet Alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
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
        @foreach ($citas as $cita)    
        <tr>
            <td>{{$cita->DUI}}</td>
            <td scope="row">{{$cita->nombre}}</td>
            <td>{{$cita->event}}</td>
            <td>{{$cita->start_date}}</td>
            <td>{{$cita->end_date}}</td>
            <td>
                <a style="font-size: 8px; margin-bottom: 1mm;" href="{{ url('/citas/'.$cita->id.'/edit') }}" class="btn btn-info">Editar</a>
                <button   style="font-size: 8px; margin-bottom: 1mm;" class="btn btn-danger" onclick="ConfirmarEliminar('{{ $cita->id }}')">Borrar</button>
                <form id="delete-form-{{ $cita->id }}" action="{{ url('/citas/'.$cita->id) }}" method="POST" style="display: none;">
                    @csrf
                    {{ method_field('DELETE') }}
                </form>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mb-3">
<a href="{{url('/events') }}" class="btn btn-secondary">Cancelar</a>

</div>
<script>
    
$(document).ready(function() {
    let table = new DataTable('#table');
    $('#table').DataTable();
});

/*Mensaje de confirmar elimininación de */
function ConfirmarEliminar(citaId) {
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
            document.getElementById('delete-form-' + citaId).submit();
            }
        });
    }
</script>
@endsection
