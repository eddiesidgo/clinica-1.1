@extends('layouts/layoutMaster')
@section('title', 'Recetas')
@section('content')

<h4>Formulario para editar receta </h4> 

<form action="{{ url('/Recetas/'.$Recetas->id) }}" method="post" class="mb-3">
    @csrf 
    {{ method_field('PATCH') }}
    @include('Recetas.form')
</form>
@endsection
