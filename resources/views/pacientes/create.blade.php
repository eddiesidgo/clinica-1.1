@extends('layouts/layoutMaster')

@section('title', 'Pacientes')

@section('content')
<h4>Registrar Nuevo Paciente: </h4>

<form action="{{ url('/pacientes') }}" method="POST" class="mb-3">
    @csrf
    
    @include('pacientes.form')
    
</form>


@endsection