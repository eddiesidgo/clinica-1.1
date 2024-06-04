@extends('layouts/layoutMaster')

@section('title', 'Citas')

@section('content')
<div class="mb-3">
<a href="{{url('/events/create') }}" class="btn btn-info">+ Nueva Cita</a> 
</div>
<div class="container-fluid" id='calendar'></div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js"></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
      const calendarEl = document.getElementById('calendar');
      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        //slotMinTime: '06:00',
        events: @json($events)
      });
      calendar.render();
    });

  </script>

@endsection


