@extends('layouts.layoutMaster')

@section('title', 'Crear Consulta')

@section('content')
<h4>Formulario para crear una nueva Consulta</h4>

<form action="{{ url('/consultas') }}" method="post" class="mb-3">
    @csrf
    @include('consultas.form', ['consulta' => null, 'dat' => $dat])
</form>
@endsection
