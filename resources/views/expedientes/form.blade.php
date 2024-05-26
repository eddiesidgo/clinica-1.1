
<?php
?>
<!-- Aqui el select llama el nombre del paciente -->
    <label for="Paciente" class="form-label">Seleccione el Paciente:</label>
    <select class="form-control" name="id_Paciente" id="idExp">
        @foreach($dat as $paciente)
            <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
        @endforeach
    </select>

    <br>
    <label for="Antecedentes" class="form-label">Antecedentes:</label>
    <input
        type="text"
        class="form-control"
        name="antecedentes"
        id="antecedentes"
        placeholder=""
        value="{{ isset($expedientes->antecedentes)?$expedientes->antecedentes:'' }}"
    />
    <br>
    <label for="Alergias" class="form-label">Alergías:</label>
    <input
        type="text"
        class="form-control"
        name="alergias"
        id="alergias"
        placeholder=""
        value="{{ isset($expedientes->alergias)?$paciente->alergias:'' }}"
    />
    <BR>
    <label for="medicamentos" class="form-label">Medicamentos:</label>
    <input
        type="text"
        class="form-control"
        name="medicamento"
        id="medicamento"
        placeholder=""
        value="{{ isset($expedientes->medicamento)?$expedientes->medicamento:'' }}"

    /> <br>

    <label for="histo" class="form-label">Historial Quirurjico</label>
    <input
        type="text"
        class="form-control"
        name="histquirurgico"
        id="histquirurgico"
        placeholder=""
        value="{{ isset($expedientes->histquirurgico)?$expedientes->histquirurgico:'' }}"
    /> <br>

    <input
        class="btn btn-info"
        type="submit"
        value="Guardar Datos"
    />

    <a href="{{url('/expedientes') }}" class="btn btn-warning">Regresar</a> <br>
