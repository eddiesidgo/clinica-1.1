<div class="mb-3">
<!--Label seguido de un input de tipo texto dónde se encuentra para ingresar el DUI-->
<label for="Nombre" class="form-label">Documento único de Identidad</label>
    <input
        type="text"
        class="form-control"
        name="DUI"
        id="DUI"
        placeholder=""
        value="{{ isset($paciente->DUI)?$paciente->DUI:'' }}"/>
</div>
<div class="mb-3">
<!--Label seguido de un input de tipo texto dónde se encuentra para ingresar el Nombre-->
<label for="Nombre" class="form-label">Nombre</label>
    <input
        type="text"
        class="form-control"
        name="Nombre"
        id="Nombre"
        placeholder=""
        value="{{ isset($paciente->nombre)?$paciente->nombre:'' }}"/>
</div>
<!--Label seguido de un input de tipo texto dónde se encuentra para ingresar el Género-->
<div class="mb-3">
<!--Declaración de variable genero-->
@php
$generos = ['Masculino', 'Femenino', 'No Binario'];
@endphp
<label for="Genero" class="form-label">Género</label>
<!--Select dónde se visualiza los géneros-->
<select class="form-control" name="Genero" id="Genero">
    <!--El bucle recorrera la variable "genero" que contiene información de array-->
    @foreach($generos as $genero)
    <!--El option dónde se hará se seleccionará la información que ha alegido el usuario y se enviara a la DDBB-->
        <option value="{{ $genero }}" {{ isset($paciente->genero) && $paciente->genero == $genero ? 'selected' : '' }}>
            {{ $genero }}
        </option>
    @endforeach
</select>
</div>
<!--Label seguido de un input de tipo texto dónde se encuentra para ingresar el Dirección-->
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
<!--Label seguido de un input de tipo texto dónde se encuentra para ingresar el Teléfono-->
<div class="mb-3">
    <label for="Telefono" class="form-label">Teléfono</label>
    <input
        type="text"
        class="form-control"
        name="Telefono"
        id="Telefono"
        placeholder=""
        value="{{ isset($paciente->telefono)?$paciente->telefono:'' }}"/>
</div>
<!--Label seguido de un input de tipo texto dónde se encuentra para ingresar el Correo Electrónico-->
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
        value="Guardar"/>
    <a href="{{url('/pacientes') }}" class="btn btn-secondary">Cancelar</a>
</div>

