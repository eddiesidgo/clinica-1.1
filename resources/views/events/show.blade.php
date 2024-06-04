@extends('layouts/layoutMaster')

@section('title', 'Citas')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>Nombre del Paciente</th>
            <th>Asunto</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Finalizacion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $event)    
        <tr>
            <td scope="row">{{$event->paciente->nombre}}</td>
            <td>{{$event->event}}</td>
            <td>{{$event->start_date}}</td>
            <td>{{$event->end_date}}</td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection
