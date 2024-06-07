@extends('layouts/layoutMaster')

@section('title', 'Citas')

@section('content')

@role('secre')
<a href="{{url('/events/create') }}" class="btn btn-primary">+ Nueva Cita</a> 
@endrole
@role('doctor')
<a href="{{ route('consultas.index') }}" class="btn btn-success">Consultas</a>
@endrole
<a href="{{url('/events/show') }}" class="btn btn-warning">Lista de citas</a>
<a href="{{route('events.pdf')}}" class="btn btn-info">Reporte de Citas</a>

<br> <br>

<div class="container-fluid" id='calendar'></div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js"></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
      const calendarEl = document.getElementById('calendar');
      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        
        events: @json($events)
      });
      
      calendar.render();

     
    });

  </script>

@endsection


