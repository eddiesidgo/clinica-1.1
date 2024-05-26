
<?php
?>
<!-- Aqui el select llama el nombre del paciente -->
<div class="form-group">
    <label for="Paciente" class="form-label">Seleccione el Paciente:</label>
    <select class="form-control" name="id_Paciente" id="id_Paciente">
        @foreach($dat as $paciente)
            <option value="{{ $paciente->id }}" {{ isset($expediente) && $expediente->id_Paciente == $paciente->id ? 'selected' : '' }}>
                {{ $paciente->nombre }}
            </option>
        @endforeach
    </select>
</div>
<br>

<div class="form-group">
    <label for="Antecedentes" class="form-label">Antecedentes:</label>
    <textarea class="form-control" name="antecedentes" id="antecedentes" rows="3">{{ isset($expediente) ? $expediente->antecedentes : '' }}</textarea>
</div>
<br>

<div class="form-group">
    <label for="Alergias" class="form-label">Alergías:</label>
    <textarea class="form-control" name="alergias" id="alergias" rows="3">{{ isset($expediente) ? $expediente->alergias : '' }}</textarea>
</div>
<br>

<div class="form-group">
    <label for="Medicamentos" class="form-label">Medicamentos:</label>
    <textarea class="form-control" name="medicamento" id="medicamento" rows="3">{{ isset($expediente) ? $expediente->medicamento : '' }}</textarea>
</div>
<br>

<div class="form-group">
    <label for="Historial Quirúrgico" class="form-label">Historial Quirúrgico:</label>
    <textarea type="text" class="form-control" name="histquirurgico" id="histquirurgico" value="{{ isset($expediente) ? $expediente->histquirurgico : '' }}"></textarea>
</div>
<br>

<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{ url('/expedientes') }}" class="btn btn-secondary">Cancelar</a>
