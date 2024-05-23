<br>
<label for="Nombre" class="form-label">Nombre de paciente</label>
<br>
    <input
        type="text"
        class="form-control"
        name="Paciente"
        id="Paciente"
        placeholder=""
        value="{{ isset($Recetas->Paciente)?$Recetas->Paciente:'' }}"/>
<br>
    <label for="Genero" class="form-label">Correo electrónico</label>
    <input
        type="text"
        class="form-control"
        name="Correo"
        id="Correo"
        placeholder=""
        value="{{ isset($Recetas->correo_electronico)?$Recetas->correo_electronico:''}}"
    />
<br>
    <label for="Direccion" class="form-label">Receta médica</label>
    <input
        type="text"
        class="form-control"
        name="Receta"
        id="Receta"
        placeholder=""
        value="{{ isset($Recetas->Receta)?$Recetas->Receta:''}}"/>
<br>
 <input
        class="btn btn-info"
        type="submit"
        value="Guardar Datos"
    />
