@extends('layouts.layoutMaster')

@section('title', 'Crear Expediente')

@section('content')
<h4>Formulario para crear un nueva Consulta</h4>

<form action="{{ url('/consultas') }}" method="post" class="mb-3">
    @csrf
    @include('consultas.form', ['consulta' => null, 'dat' => $dat])
</form>
@endsection