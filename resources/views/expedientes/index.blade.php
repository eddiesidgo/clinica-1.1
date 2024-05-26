@extends('layouts/layoutMaster')

@section('title', 'Expedientes')

@section('content')
<h4>Gestionar Pacientes</h4>

@if (Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif

<a href="{{url('/pacientes/create') }}" class="btn btn-primary">Nuevo Expediente</a> <br>


@endsection
