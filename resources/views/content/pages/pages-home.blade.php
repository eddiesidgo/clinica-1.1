@extends('layouts/layoutMaster')

@section('title', 'Página Principal - Clínica')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title">Página Principal</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Este Contenido es Público</h5>
                    <p class="card-text">Bienvenidos a la Clínica. Aquí nos dedicamos a brindar la mejor atención médica para usted y su familia. Nuestro equipo de profesionales está comprometido con su salud y bienestar.</p>
                    
                    @role('admin')
                    <div class="admin-section mt-4">
                        <h5 class="text-primary">Panel de Administración</h5>
                        <p>Acceda a las herramientas administrativas y gestione la clínica de manera eficiente.</p>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('admin.dashboard') }}">Dashboard Administrativo</a></li>
                            <li class="list-group-item"><a href="{{ route('admin.reports') }}">Reportes</a></li>
                            <li class="list-group-item"><a href="{{ route('admin.settings') }}">Configuraciones</a></li>
                        </ul>
                    </div>
                    @endrole

                    @role('secre')
                    <div class="secre-section mt-4">
                        <h5 class="text-primary">Panel de Secretaria</h5>
                        <p>Gestione las citas, contacte a los pacientes y maneje la documentación necesaria.</p>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('events.index') }}">Programar Citas</a></li>
                            <li class="list-group-item"><a href="{{ route('pacientes.index') }}">Lista de Pacientes</a></li>
                        </ul>
                    </div>
                    @endrole

                    @role('doctor')
                    <div class="doctor-section mt-4">
                        <h5 class="text-primary">Panel de Doctor</h5>
                        <p>Acceda a las historias clínicas de sus pacientes, gestione consultas y tratamientos.</p>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('pacientes.index') }}">Mis Pacientes</a></li>
                            <li class="list-group-item"><a href="{{ route('consultas.index') }}">Consultas</a></li>
                        </ul>
                    </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
