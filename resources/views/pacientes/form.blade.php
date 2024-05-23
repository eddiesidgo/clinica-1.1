<label for="Nombre" class="form-label">Nombre</label>
    <input
        type="text"
        class="form-control"
        name="Nombre"
        id="Nombre"
        placeholder=""
        value="{{ isset($paciente->nombre)?$paciente->nombre:'' }}"
    />
<?php
    /*<label for="Genero" class="form-label">Genero</label>
    <input
        type="text"
        class="form-control"
        name="Genero"
        id="Genero"
        placeholder=""
        value="{{ isset($paciente->genero)?$paciente->genero:'' }}"
    />*/
?>
    <label for="Genero" class="form-label">Género</label>
        <select
            class="form-control"
            name="Genero"
            id="Genero"
        >
            <option value="Masculino" {{ isset($paciente->genero) && $paciente->genero == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Femenino" {{ isset($paciente->genero) && $paciente->genero == 'Femenino' ? 'selected' : '' }}>Femenino</option>
            <option value="No Binario" {{ isset($paciente->genero) && $paciente->genero == 'No Binario' ? 'selected' : '' }}>No Binario</option>
        </select>

    <label for="Direccion" class="form-label">Direccion</label>
    <input
        type="text"
        class="form-control"
        name="Direccion"
        id="Direccion"
        placeholder=""
        value="{{ isset($paciente->direccion)?$paciente->direccion:'' }}"
    />

    <label for="Telefono" class="form-label">Telefono</label>
    <input
        type="number"
        class="form-control"
        name="Telefono"
        id="Telefono"
        placeholder=""
        value="{{ isset($paciente->telefono)?$paciente->telefono:'' }}"
    />

    <label for="correo_electronico" class="form-label">Correo Electronico</label>
    <input
        type="text"
        class="form-control"
        name="correo_electronico"
        id="correo_electronico"
        placeholder=""
        value="{{ isset($paciente->correo_electronico)?$paciente->correo_electronico:'' }}"
    /> <br>

    <input
        class="btn btn-info"
        type="submit"
        value="Guardar Datos"
    />

    <a href="{{url('/pacientes') }}" class="btn btn-warning">Regresar</a> <br>
