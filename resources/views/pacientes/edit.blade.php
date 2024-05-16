@extends('layouts/layoutMaster')

@section('title', 'Pacientes')

@section('content')

Formulario para editar Pacientes

<form action="{{ url('/pacientes') }}" method="post" class="mb-3">
    @include('pacientes.form')
</form>

@endsection
