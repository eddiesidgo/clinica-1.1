@extends('layouts/layoutMaster')

@section('title', 'Recetas')

@section('content')
<h4>Ingresa la receta</h4>

<form action="{{ url('/Recetas') }}" method="POST" class="mb-3">
    @csrf
    
    @include('Recetas.form')
    
</form>
@endsection