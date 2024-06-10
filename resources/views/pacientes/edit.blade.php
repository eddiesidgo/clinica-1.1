@extends('layouts/layoutMaster')
@section('title', 'Pacientes')
@section('content')


<div class="mb-3">
<h4>Información del paciente</h4> 
</div>

<form id="editPacienteForm{{$paciente->id}}" action="{{ url('/pacientes/'.$paciente->id) }}" method="post" class="mb-3">
    @csrf
    {{ method_field('PATCH') }}
    @include('pacientes.form')
</form>
@endsection
