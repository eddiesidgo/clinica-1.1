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
    <label for="Diagnostico" class="form-label">Diagnóstico:</label>
    <textarea class="form-control" name="diagnostico" id="diagnostico" rows="3">{{ isset($consulta) ? $consulta->diagnostico : '' }}</textarea>
</div>
<br>

<div class="form-group">
    <label for="Estado" class="form-label">Estado:</label>
    <span class="form-control" id="estado" readonly>Pendiente</span>
    <!-- Campo oculto para almacenar el estado -->
    <input type="hidden" name="estado" value="Pendiente">
</div>
<br>

<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{ url('/consultas') }}" class="btn btn-secondary">Cancelar</a>
