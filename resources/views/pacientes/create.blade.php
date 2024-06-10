@extends('layouts/layoutMaster')
@section('title', 'Pacientes')
@section('content')

<div class="mb-3">
<h4>Registrar Nuevo Paciente:</h4>
</div>

<form action="{{ url('/pacientes') }}" method="POST" class="mb-3">
    @csrf
    @include('pacientes.form')
</form>
@endsection