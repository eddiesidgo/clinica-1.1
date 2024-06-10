<style>
    .container {
        display: flex;
        justify-content:right;
    }
    /*Tamaño de input tipo text*/
    .form-control{
        width: 100%;
    }
    </style>
<div class="container">
    <div class="mb-3">
        <label>Buscar:</label>
        <input class="form-control" type="text" id="buscar" placeholder="Buscar el paciente" list="pacientesList">
        <datalist id="pacientesList">
            @foreach($dat as $paciente)
                <option value="{{ $paciente->nombre }}" data-id="{{ $paciente->id }}" data-dui="{{ $paciente->DUI }}"></option>
            @endforeach
        </datalist>
    </div>
</div> 
<div class="mb-3">   
    <label for="Antecedentes" class="form-label">Documento Único de Identidad:</label>
    <input class="form-control" name="DUI" id="DUI" rows="3"{{ isset($expediente) ? $expediente->DUI : '' }}>
</div>
<div class="mb-3">   
    <label for="Antecedentes" class="form-label">Paciente:</label>
    <input class="form-control" name="nombre" id="nombre" rows="3"{{ isset($expediente) ? $expediente->nombre : '' }}>
</div>
<div class="mb-3">   
    <label for="Antecedentes" class="form-label">Antecedentes:</label>
    <textarea class="form-control" name="antecedentes" id="antecedentes" rows="3">{{ isset($expediente) ? $expediente->antecedentes : '' }}</textarea>
</div>
<div class="mb-3">   
    <label for="Alergias" class="form-label">Alergías:</label>
    <textarea class="form-control" name="alergias" id="alergias" rows="3">{{ isset($expediente) ? $expediente->alergias : '' }}</textarea>
</div>
<div class="mb-3">   
    <label for="Medicamentos" class="form-label">Medicamentos:</label>
    <textarea class="form-control" name="medicamento" id="medicamento" rows="3">{{ isset($expediente) ? $expediente->medicamento : '' }}</textarea>
</div>
<div class="mb-3">   
    <label for="Historial Quirúrgico" class="form-label">Historial Quirúrgico:</label>
    <textarea type="text" class="form-control" name="histquirurgico" id="histquirurgico" value="{{ isset($expediente) ? $expediente->histquirurgico : '' }}"></textarea>
</div>
<div class="mb-3">   
<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{ url('/expedientes') }}" class="btn btn-secondary">Cancelar</a>
</div>
<script>
    document.getElementById('buscar').addEventListener('input', function() {
       var input = this;
       var list = input.getAttribute('list');
       var options = document.querySelectorAll('#' + list + ' option');
       var inputValue = input.value;

       // Encontrar el option seleccionado
       for(var i = 0; i < options.length; i++) {
           var option = options[i];
           if(option.value === inputValue) {
               // Obtener los datos del paciente
               var dui = option.getAttribute('data-dui');
               var nombre = option.value;

               // Asignar los valores a los campos correspondientes
               document.getElementById('DUI').value = dui;
               document.getElementById('nombre').value = nombre;
               break;
           }
       }
   });
   </script>
