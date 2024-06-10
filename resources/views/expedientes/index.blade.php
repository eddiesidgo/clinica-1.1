@extends('layouts.layoutMaster')
@section('title', 'Expedientes')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    /*El contenedor general de buscar paciente*/
        .container {
        display: flex;
        justify-content:right;
    }
    /*Tamaño de input tipo text*/
    .form-control{
        width: 100%;
    }
    /*Contenedor de paginado*/
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    /* Paginación*/
    .pagination a,
    .pagination span {
        color:  #2980b9 ;
        padding: 8px 12px;
        margin: 0 3px;
        text-decoration: none;
        border: 1px solid  #d0d3d4 ;
        border-radius: 3px;
    }
    .pagination a:hover {
        background-color: #f5f5f5;
    }
    .pagination .active {
        background-color: #2471a3  ;
        color: #fff;
    }
    
    .pagination .arrow {
        font-size: 14px;
        line-height: 16px;
    }
</style>
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
<a href="{{ url('/expedientes/create') }}" class="btn btn-primary">+ Crear Expediente</a>
@endrole
@role('doctor')
<a href="{{ route('consultas.index') }}" class="btn btn-primary">Consultas</a>
@endrole
</div>
<div class="container">
    <div class="mb-3">
<label>Buscar:</label>
<input class="form-control" type="text" id="buscar" placeholder="Buscar el expediente">
</div>
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
                <td>{{ $expediente->DUI}}</td>
                <td>{{ $expediente->nombre}}</td>
                <td>{{ $expediente->antecedentes }}</td>
                <td>{{ $expediente->alergias }}</td>
                <td>{{ $expediente->medicamento }}</td>
                <td>{{ $expediente->histquirurgico }}</td>
                <td>
                    @role('secre')
                    <a style='font-size: 11px;' href="{{ url('/expedientes/'.$expediente->id.'/edit') }}" class="btn btn-info">Editar</a>
                    <button style="font-size: 11px;" class="btn btn-danger" onclick="confirmDelete('{{ $expediente->id }}')">Borrar</button>
                    @endrole
                    <form id="delete-form-{{ $expediente->idExp }}" action="{{ url('/expedientes/' . $expediente->idExp) }}" method="POST" style="display: none;">
                        @csrf
                        {{ method_field('DELETE') }}
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
    @if ($expedientes->onFirstPage())
        <span>&laquo;</span>
    @else
        <a href="{{ $expedientes->previousPageUrl() }}" rel="prev">&laquo;</a>
    @endif

    @for ($i = 1; $i <= $expedientes->lastPage(); $i++)
        <a href="{{ $expedientes->url($i) }}" class="{{ $expedientes->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
    @endfor

    @if ($expedientes->hasMorePages())
        <a href="{{ $expedientes->nextPageUrl() }}" rel="next">&raquo;</a>
    @else
        <span>&raquo;</span>
    @endif
</div>
<script>
    document.getElementById('buscar').addEventListener('input', function() {
        var input = this;
        var list = input.getAttribute('list');
        var options = document.querySelectorAll('#' + list + ' option');
        var inputValue = input.value;

        // Encontrar el option seleccionado
        for(var i = 0; i < options.length; i++) {
            var option = options[i];
            if(option.value === inputValue) {
                // Obtener los datos del paciente
                var dui = option.getAttribute('data-dui');
                var nombre = option.value;

                // Asignar los valores a los campos correspondientes
                document.getElementById('DUI').value = dui;
                document.getElementById('nombre').value = nombre;
                break;
            }
        }
    });
   /*Mensaje de confirmar elimininación de */
       function ConfirmarEliminar(pacienteId) {
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
               document.getElementById('delete-form-' + pacienteId).submit();
               }
           });
       }
   </script>
@endsection
