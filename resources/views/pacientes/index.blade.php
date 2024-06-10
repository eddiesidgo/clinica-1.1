@extends('layouts/layoutMaster')
@section('title', 'Pacientes')
@section('content')

<!-- Las CDN de Sweet Alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--Diseño de Input de busqueda & diseño de paginado-->
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
<!--Texto de ventana de agregar pacientes-->
<div class="mb-3">
<h4>Gestionar Pacientes</h4>
</div>
@if (Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif
    <div class="mb-3">
<a href="{{url('/pacientes/create') }}" class="btn btn-primary">+ Nuevo Paciente</a> <br>
</div>
<div class="container">
        <div class="mb-3">
<label>Buscar:</label>
<input class="form-control" type="text" id="buscar" placeholder="Buscar el paciente">
</div>
</div>

<table class="table" id="Tabla">
    <thead>
        <tr>
            <th>DUI</th>
            <th>Nombre</th>
            <th>Genero</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo Electronico</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $paciente)
        <tr>
            <td>{{$paciente->DUI}}</td>
            <td>{{$paciente->nombre}}</td>
            <td>{{$paciente->genero}}</td>
            <td>{{$paciente->direccion}}</td>
            <td>{{$paciente->telefono}}</td>
            <td>{{$paciente->correo_electronico}}</td>
            <td>
                <a style="font-size: 8px; margin-bottom: 1mm;" href="{{ url('/pacientes/'.$paciente->id.'/edit') }}" class="btn btn-warning">Editar</a>
                <button   style="font-size: 8px; margin-bottom: 1mm;" class="btn btn-danger" onclick="ConfirmarEliminar('{{ $paciente->id }}')">Borrar</button>
                <form id="delete-form-{{ $paciente->id }}" action="{{ url('/pacientes/'.$paciente->id) }}" method="POST" style="display: none;">
                    @csrf
                    {{ method_field('DELETE') }}
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
    @if ($pacientes->onFirstPage())
        <span>&laquo;</span>
    @else
        <a href="{{ $pacientes->previousPageUrl() }}" rel="prev">&laquo;</a>
    @endif

    @for ($i = 1; $i <= $pacientes->lastPage(); $i++)
        <a href="{{ $pacientes->url($i) }}" class="{{ $pacientes->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
    @endfor

    @if ($pacientes->hasMorePages())
        <a href="{{ $pacientes->nextPageUrl() }}" rel="next">&raquo;</a>
    @else
        <span>&raquo;</span>
    @endif
</div>

<script>
 document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("buscar");
        const table = document.getElementById("Tabla");
        const rows = table.getElementsByTagName("tr");

        searchInput.addEventListener("input", function() {
            const searchTerm = searchInput.value.toLowerCase();

            for (let i = 0; i < rows.length; i++) { 
                const cells = rows[i].getElementsByTagName("td");
                let found = false;

                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].innerText.toLowerCase();

                    if (cellText.includes(searchTerm)) {
                        found = true;
                        break;
                    }
                }
                if (found) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        });
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
