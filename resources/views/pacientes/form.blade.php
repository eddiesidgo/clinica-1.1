<div class="mb-3">
<label for="Nombre" class="form-label">Documento Único de Identidad</label>
    <input
        type="text"
        class="form-control"
        name="DUI"
        id="DUI"
        placeholder=""
        value="{{ isset($paciente->DUI)?$paciente->DUI:'' }}"/>
</div>
<div class="mb-3">
<label for="Nombre" class="form-label">Nombre</label>
    <input
        type="text"
        class="form-control"
        name="Nombre"
        id="Nombre"
        placeholder=""
        value="{{ isset($paciente->nombre)?$paciente->nombre:'' }}"/>
</div>
<div class="mb-3">
    <label for="Genero" class="form-label">Género</label>
        <select
            class="form-control"
            name="Genero"
            id="Genero">
            <option value="Masculino" {{ isset($paciente->genero) && $paciente->genero == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Femenino" {{ isset($paciente->genero) && $paciente->genero == 'Femenino' ? 'selected' : '' }}>Femenino</option>
            <option value="No Binario" {{ isset($paciente->genero) && $paciente->genero == 'No Binario' ? 'selected' : '' }}>No Binario</option>
        </select>
</div>
<div class="mb-3">
    <label for="Direccion" class="form-label">Dirección</label>
    <input
        type="text"
        class="form-control"
        name="Direccion"
        id="Direccion"
        placeholder=""
        value="{{ isset($paciente->direccion)?$paciente->direccion:'' }}"/>
</div>
<div class="mb-3">
    <label for="Telefono" class="form-label">Teléfono</label>
    <input
        type="number"
        class="form-control"
        name="Telefono"
        id="Telefono"
        placeholder=""
        value="{{ isset($paciente->telefono)?$paciente->telefono:'' }}"/>
</div>
<div class="mb-3">
    <label for="correo_electronico" class="form-label">Correo Electrónico</label>
    <input
        type="text"
        class="form-control"
        name="correo_electronico"
        id="correo_electronico"
        placeholder=""
        value="{{ isset($paciente->correo_electronico)?$paciente->correo_electronico:'' }}"/>
</div>
<div class="mb-3">
    <input
        class="btn btn-primary"
        type="submit"
        value="Guardar Datos"/>
        <a href="{{url('/pacientes') }}" class="btn btn-secondary">Cancelar</a> 
</div>