@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Página Principal - Clínica')

@section('content')
<div class="container">
    <div class="jumbotron text-center bg-primary text-white">
        <h1 class="display-4">Bienvenido a la Clínica</h1>
        <p class="lead">Nuestro compromiso es brindar la mejor atención médica para usted y su familia.</p>
        <hr class="my-4">
        <p>Estamos aquí para cuidar de su salud y bienestar.</p>
    </div>

    <div class="row justify-content-center">
        @role('admin')
        <div class="col-md-4">
            <div class="card border border-primary">
                <div class="card-body text-primary">
                    <h5 class="card-title">Panel de Administración</h5>
                    <p class="card-text">Acceda a las herramientas administrativas y gestione la clínica de manera eficiente.</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Dashboard Administrativo</a>
                </div>
            </div>
        </div>
        @endrole

        @role('secre')
        <div class="col-md-4">
            <div class="card border border-primary">
                <div class="card-body text-primary">
                    <h5 class="card-title">Panel de Secretaria</h5>
                    <p class="card-text">Gestione las citas, contacte a los pacientes y maneje la documentación necesaria.</p>
                    <a href="#" class="btn btn-primary">Programar Citas</a>
                </div>
            </div>
        </div>
        @endrole

        @role('doctor')
        <div class="col-md-4">
            <div class="card border border-primary">
                <div class="card-body text-primary">
                    <h5 class="card-title">Panel de Doctor</h5>
                    <p class="card-text">Acceda a las historias clínicas de sus pacientes, gestione consultas y tratamientos.</p>
                    <a href="#" class="btn btn-primary">Mis Pacientes</a>
                </div>
            </div>
        </div>
        @endrole
    </div>
</div>
@endsection
