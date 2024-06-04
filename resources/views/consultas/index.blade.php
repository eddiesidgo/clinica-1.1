@extends('layouts.layoutMaster')

@section('title', 'Consultas')

@section('content')
<h4>Gestionar Consultas</h4>

@if (Session::has('mensaje'))
    <div class="alert alert-success">
        {{ Session::get('mensaje') }}
    </div>
@endif

<a href="{{ url('/consultas/create') }}" class="btn btn-primary">Crear Consulta</a>
<br><br>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Fecha de la Consulta</th>
            <th>Diagnóstico</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($consultas as $consulta)
            <tr>
                <td>{{ $consulta->idConsulta }}</td>
                <td>{{ $consulta->event->start_date }}</td>
                <td>{{ $consulta->diagnostico }}</td>
                <td>
                    <span id="estado-{{ $consulta->idConsulta }}">{{ $consulta->estado }}</span>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a style='font-size: 11px;' href="{{ url('/consultas/'.$consulta->idConsulta.'/edit') }}" class="btn btn-info" id="editar-{{ $consulta->idConsulta }}">Editar</a>
                        <button style="font-size: 11px;" class="btn btn-primary" onclick="updateEstado('{{ $consulta->idConsulta }}', 'Pendiente')" id="pendiente-{{ $consulta->idConsulta }}">Pendiente</button>
                        <button style="font-size: 11px;" class="btn btn-warning" onclick="updateEstado('{{ $consulta->idConsulta }}', 'En Proceso')" id="enproceso-{{ $consulta->idConsulta }}">En Proceso</button>
                        <button style="font-size: 11px;" class="btn btn-success" onclick="updateEstado('{{ $consulta->idConsulta }}', 'Finalizada')" id="finalizada-{{ $consulta->idConsulta }}-extra">Finalizada</button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function updateEstado(consultaId, estado) {
        $.ajax({
            url: '{{ route("consultas.updateEstado", ":consultaId") }}'.replace(':consultaId', consultaId),
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                estado: estado
            },
            success: function(response) {
                if (response.success) {
                    $('#estado-' + consultaId).text(estado);
                    if (estado === 'Finalizada') {
                        $('#pendiente-' + consultaId + ', #enproceso-' + consultaId + ', #editar-' + consultaId).attr('disabled', true);
                        document.cookie = 'consulta_' + consultaId + '=' + estado + '; path=/';
                    }
                }
            }
        });
    }

    $(document).ready(function() {
        $('[id^="pendiente-"], [id^="enproceso-"], [id^="finalizada-"]').each(function() {
            var consultaId = this.id.split('-')[1];
            var estado = getCookie('consulta_' + consultaId);
            if (estado === 'Finalizada') {
                $('#pendiente-' + consultaId + ', #enproceso-' + consultaId + ', #editar-' + consultaId).attr('disabled', true);
            }
        });
    });

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
</script>
@endsection
