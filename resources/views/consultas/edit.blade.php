@extends('layouts.layoutMaster')

@section('title', 'Editar Consulta')

@section('content')

<h4>Formulario para editar la consulta:</h4>

<form id="editConsultaForm{{ $consulta->idConsulta }}" action="{{ url('/consultas/'.$consulta->idConsulta) }}" method="post" class="mb-3">
    @csrf
    {{ method_field('PATCH') }}
    @include('consultas.form', ['consulta' => $consulta, 'dat' => $dat])
</form>
@endsection
