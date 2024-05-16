<label for="Nombre" class="form-label">Nombre</label>
    <input
        type="text"
        class="form-control"
        name="Nombre"
        id="Nombre"
        placeholder=""
        value="{{ isset($paciente->nombre)?$paciente->nombre:'' }}"
    />

    <label for="Genero" class="form-label">Genero</label>
    <input
        type="text"
        class="form-control"
        name="Genero"
        id="Genero"
        placeholder=""
        value="{{ isset($paciente->genero)?$paciente->genero:'' }}"
    />

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
        type="text"
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
        class="btn btn-primary"
        type="submit"
        value="Guardar Datos"
    />

    <a href="{{url('/pacientes') }}" class="btn btn-dark">Regresar</a> <br>
