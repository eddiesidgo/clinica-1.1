@extends('layouts/layoutMaster')

@section('title', 'Pacientes')

@section('content')

<h4>Formulario para editar Pacientes: </h4> 


<form action="{{ url('/pacientes/'.$paciente->id) }}" method="post" class="mb-3">
    @csrf 
    {{ method_field('PATCH') }}
    @include('pacientes.form')
</form>

@endsection
