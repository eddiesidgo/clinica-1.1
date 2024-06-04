@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Página Principal - Clínica')

@section('content')
<div class="container">
    <h4>Página Principal</h4>
    <h4>Este Contenido es Público</h4>
    <p>Bienvenidos a la Clínica. Aquí nos dedicamos a brindar la mejor atención médica para usted y su familia. Nuestro equipo de profesionales está comprometido con su salud y bienestar.</p>
    
    @role('admin')
    <div class="admin-section">
        <h5>Panel de Administración</h5>
        <p>Acceda a las herramientas administrativas y gestione la clínica de manera eficiente.</p>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard Administrativo</a></li>
            <li><a href="{{ route('admin.reports') }}">Reportes</a></li>
            <li><a href="{{ route('admin.settings') }}">Configuraciones</a></li>
        </ul>
    </div>
    @endrole

    @role('secre')
    <div class="secre-section">
        <h5>Panel de Secretaria</h5>
        <p>Gestione las citas, contacte a los pacientes y maneje la documentación necesaria.</p>
        <ul>
            <li><a href="">Programar Citas</a></li>
            <li><a href="">Lista de Pacientes</a></li>
            <li><a href="">Documentación</a></li>
        </ul>
    </div>
    @endrole

    @role('doctor')
    <div class="doctor-section">
        <h5>Panel de Doctor</h5>
        <p>Acceda a las historias clínicas de sus pacientes, gestione consultas y tratamientos.</p>
        <ul>
            <li><a href="">Mis Pacientes</a></li>
            <li><a href="">Mi Horario</a></li>
            <li><a href="">Consultas</a></li>
        </ul>
    </div>
    @endrole
</div>
@endsection
