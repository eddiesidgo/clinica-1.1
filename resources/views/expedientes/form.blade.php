
<?php
?>
<!-- Aqui el select llama el nombre del paciente -->
<div class="mb-3">
    <label for="id_Paciente" class="form-label">Seleccione el Paciente:</label>
    <input class="form-control" name="nombre_Paciente" id="nombre_Paciente" list="pacientesList" placeholder="Seleccione o escriba el nombre del paciente" 
        value="{{ isset($expediente) ? $expediente->paciente->nombre : '' }}">
    <datalist id="pacientesList">
        @foreach($dat as $paciente)
            <option value="{{ $paciente->nombre }}"></option>
        @endforeach
    </datalist>
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
