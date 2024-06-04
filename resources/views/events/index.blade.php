@extends('layouts/layoutMaster')

@section('title', 'Citas')

@section('content')

<a href="{{url('/events/create') }}" class="btn btn-primary">+ Nueva Cita</a> <br> <br>

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


