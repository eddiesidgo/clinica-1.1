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
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $event)    
        <tr>
            <td scope="row">{{$event->paciente->nombre}}</td>
            <td>{{$event->event}}</td>
            <td>{{$event->start_date}}</td>
            <td>{{$event->end_date}}</td>
            <td><a href="{{url('/events/edit') }}" class="btn btn-primary">Editar</a> 
                
                <a href="{{route('events.pdf')}}" class="btn btn-info">Comprobante</a>

                <button class="btn btn-danger" onclick="confirmDelete('{{ $event->id }}')">Borrar</button>
                <form id="delete-form-{{ $event->id }}" action="{{ url('/events/'.$event->id) }}" method="POST" style="display: none;">
                    @csrf
                    {{ method_field('DELETE') }}
                </form>


            </td> 
        </tr>

        @endforeach

        
    </tbody>
</table>

<a href="{{url('/events') }}" class="btn btn-warning">Regresar</a>


@endsection
