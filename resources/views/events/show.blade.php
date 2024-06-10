@extends('layouts/layoutMaster')
@section('title', 'Citas')
@section('content')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <a style="font-size: 8px; margin-bottom: 1mm;" href="{{ url('/events/'.$event->id.'/ComprobantePDF') }}" class="btn btn-danger d-block" target="_blank">Comprobante</a>
                <a style="font-size: 8px; margin-bottom: 1mm;" class="btn btn-warning d-block" onclick="ConfirmarEliminar('{{ $event->id }}')">Eliminar</a>


                <form id="delete-form-{{ $event->id }}" action="{{ url('/events/'.$event->id) }}" method="POST" style="display: none;">
                    @csrf
                    {{ method_field('DELETE') }}
                </form>
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mb-3">
<a href="{{url('/events') }}" class="btn btn-secondary">Cancelar</a>
</div>
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
</script>
@endsection
