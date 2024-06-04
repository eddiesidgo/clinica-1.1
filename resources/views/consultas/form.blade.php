<?php
?>
<!-- Aqui el select llama la fecha de la consulta -->
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
    <input type="text" class="form-control" name="estado" id="estado" value="{{ isset($consulta) ? $consulta->estado : '' }}">
</div>
<br>

<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{ url('/consultas') }}" class="btn btn-secondary">Cancelar</a>
