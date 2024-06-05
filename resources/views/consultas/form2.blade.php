<form action="{{ isset($consulta) ? url('/consultas/'.$consulta->idConsulta) : url('/consultas') }}" method="POST" class="mb-3">
    @csrf
    @if(isset($consulta))
        @method('PUT')
    @endif
    
    <div class="form-group">
        <label for="Consulta" class="form-label">Seleccione la Fecha de la Consulta:</label>
        <select class="form-control" name="id_Cita" id="id_Cita">
            @foreach($dat as $cita)
                <option value="{{ $cita->id }}" {{ isset($consulta) && $consulta->id_Cita == $cita->id ? 'selected' : '' }}>
                    {{ $cita->start_date }}
                </option>
            @endforeach
        </select>
    </div>
    <br>

    <div class="form-group">
        <label for="Diagnostico" class="form-label">Diagnóstico de la consulta:</label>
        <textarea class="form-control" name="diagnostico" id="diagnostico" rows="3">{{ isset($consulta) ? $consulta->diagnostico : '' }}</textarea>
    </div>
    <br>

    <div class="form-group">
        <label for="Estado" class="form-label">Estado:</label>
        <div class="btn-group" role="group" aria-label="Estado">
            <button type="button" class="btn btn-primary {{ isset($consulta) && $consulta->estado == 'Pendiente' ? 'active' : '' }}" onclick="updateEstado('Pendiente')">Pendiente</button>
            <button type="button" class="btn btn-warning {{ isset($consulta) && $consulta->estado == 'En Proceso' ? 'active' : '' }}" onclick="updateEstado('En Proceso')">En Proceso</button>
            <button type="button" class="btn btn-success {{ isset($consulta) && $consulta->estado == 'Finalizada' ? 'active' : '' }}" onclick="updateEstado('Finalizada')" {{ isset($consulta) && $consulta->estado == 'Finalizada' ? 'disabled' : '' }}>Finalizada</button>
        </div>
        <!-- Campo oculto para almacenar el estado -->
        <input type="hidden" name="estado" id="estado" value="{{ isset($consulta) ? $consulta->estado : 'Pendiente' }}">
    </div>
    <br>

    <button type="submit" class="btn btn-primary">{{ isset($consulta) ? 'Actualizar' : 'Guardar' }}</button>
    <a href="{{ url('/consultas') }}" class="btn btn-secondary">Cancelar</a>
</form>

<script>
    function updateEstado(estado) {
        document.getElementById('estado').value = estado;
        document.querySelectorAll('.btn').forEach(function(btn) {
            btn.classList.remove('active');
        });
        document.querySelectorAll('.btn').forEach(function(btn) {
            if (btn.innerHTML === estado) {
                btn.classList.add('active');
            }
        });
    }
</script>
