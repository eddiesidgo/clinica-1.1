@extends('layouts/layoutMaster')

@section('title', 'Expedientes')

@section('content')
<h4>Registrar Expediente: </h4>

<form action="{{ url('/expedientes') }}" method="POST" class="mb-3">
    @csrf
    
    @include('expedientes.form')
    
</form>


@endsection