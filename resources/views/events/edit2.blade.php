@extends('layouts/layoutMaster')
@section('title', 'Citas')
@section('content')


<div class="mb-3">
<h4>Editar cita</h4> 
</div>

<form id="editCitaForm{{$cita->id}}" action="{{ url('/citas/'.$cita->id) }}" method="post" class="mb-3">
    @csrf
    {{ method_field('PATCH') }}
    @include('events.form2')
</form>
@endsection

