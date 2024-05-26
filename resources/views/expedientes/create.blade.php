@extends('layouts.layoutMaster')

@section('title', 'Crear Expediente')

@section('content')
<h4>Formulario para crear un nuevo expediente</h4>

<form action="{{ url('/expedientes') }}" method="post" class="mb-3">
    @csrf
    @include('expedientes.form', ['expediente' => null, 'dat' => $dat])
</form>
@endsection