@extends('layouts/layoutMaster')

@section('title', 'Pacientes')

@section('content')
<h4>Gestionar Pacientes</h4>
<h4>Pacientes registrados: </h4>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Genero</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo Electronico</th>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $paciente)
        <tr>
            <td>{{$paciente->id}}</td>
            <td>{{$paciente->nombre}}</td>
            <td>{{$paciente->genero}}</td>
            <td>{{$paciente->direccion}}</td>
            <td>{{$paciente->telefono}}</td>
            <td>{{$paciente->correo_electronico}}</td>
            <td>Editar | 
            <form action="{{ url('/pacientes/'.$paciente->id) }}" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" class="form-control" onclick="return confirm('¿Deseas borrar?')" value="Borrar">
            </form>    
            </td>     
        </tr>
        @endforeach
    </tbody>
</table>


@endsection