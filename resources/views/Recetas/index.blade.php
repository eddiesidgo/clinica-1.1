@extends('layouts/layoutMaster')
@section('title', 'Recetas')
@section('content')

<h4>Receta médica</h4>

@if (Session::has('mensaje'))
{{ Session::get('mensaje') }}

@endif
<a href="{{url('/Recetas/create') }}" class="btn btn-primary">Recetas</a>

@role('doctor')
<a href="{{ route('consultas.index') }}" class="btn btn-gray">Regresar</a>
@endrole
<br>
<br>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Paciente</th>
            <th>Correo electrónico</th>
            <th>Receta</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Recetas as $Recetas)
        <tr>
            <td>{{$Recetas->id}}</td>
            <td>{{$Recetas->Paciente}}</td>
            <td>{{$Recetas->Correo}}</td>
            <td>{{$Recetas->Receta}}</td>
            <td>
                <a style='font-size: 11px;' href="{{ url('/Recetas/'.$Recetas->id.'/edit') }}" class="btn btn-success">Enviar</a>
                    <br>
                    <br>
            <form action="{{ url('/Recetas/'.$Recetas->id) }}" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <input style='font-size: 11px;' type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas borrar?')" value="Borrar">
            </form>    
            </td>     
        </tr>
        @endforeach
    </tbody>
</table>
@endsection