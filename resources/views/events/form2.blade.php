<div class="mb-3">
    <!--Label seguido de un input de tipo texto dónde se encuentra para ingresar el DUI-->
    <label for="Nombre" class="form-label">Documento único de Identidad</label>
        <input
            type="text"
            class="form-control"
            name="DUI"
            id="DUI"
            placeholder=""
            value="{{ isset($cita->DUI)?$cita->DUI:'' }}"/>
    </div>
    <div class="mb-3">
    <!--Label seguido de un input de tipo texto dónde se encuentra para ingresar el Nombre-->
    <label for="nombre" class="form-label">Nombre</label>
        <input
            type="text"
            class="form-control"
            name="nombre"
            id="nombre"
            placeholder=""
            value="{{ isset($cita->nombre)?$cita->nombre:'' }}"/>
    </div>

   
    <!--Label seguido de un input de tipo texto dónde se encuentra para ingresar el Dirección-->
    <div class="mb-3">
        <label for="event" class="form-label">Asunto</label>
        <input
            type="text"
            class="form-control"
            name="event"
            id="event"
            placeholder=""
            value="{{ isset($cita->event)?$cita->event:'' }}"/>
    </div>
    <!--Label seguido de un input de tipo texto dónde se encuentra para ingresar el Teléfono-->
    <div class="mb-3">
        <label for="start_date" class="form-label">Fecha De Inicio</label>
        <input
            type="text"
            class="form-control"
            name="start_date"
            id="start_date"
            placeholder=""
            value="{{ isset($cita->start_date)?$cita->start_date:'' }}"/>
    </div>
    <!--Label seguido de un input de tipo texto dónde se encuentra para ingresar el Correo Electrónico-->
    <div class="mb-3">
        <label for="end_date" class="form-label">Fecha De Finalizacion</label>
        <input
            type="text"
            class="form-control"
            name="end_date"
            id="end_date"
            placeholder=""
            value="{{ isset($cita->end_date)?$cita->end_date:'' }}"/> 
    </div>
    <div class="mb-3">
        <input
            class="btn btn-primary"
            type="submit"
            value="Guardar"/>
        <a href="{{url('/events') }}" class="btn btn-secondary">Cancelar</a>
    </div>
    
    