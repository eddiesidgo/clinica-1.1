@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<h4>Página Principal</h4>
<h4>Este Contenido es Público</h4>
@role('secre')
<h5> Solo Admin</h5>
@endrole
@role('secre')
<h5> Solo Secretaria</h5>
@endrole
@role('doctor')
<h5> Solo Doctor</h5>
@endrole

@endsection
