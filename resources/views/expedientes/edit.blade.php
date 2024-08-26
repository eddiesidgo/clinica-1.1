@extends('layouts.layoutMaster')

@section('title', 'Editar Consulta')

@section('content')

<h4>Formulario para editar el expediente del paciente: </h4> 

<form id="editExpedienteForm{{$expediente->idExp}}" action="{{ url('/expedientes/'.$expediente->idExp) }}" method="post" class="mb-3">
    @csrf
    {{ method_field('PATCH') }}
    @include('expedientes.form', ['expediente' => $expediente, 'dat' => $dat])
</form>
@endsection
