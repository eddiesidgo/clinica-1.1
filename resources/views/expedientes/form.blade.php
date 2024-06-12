
<form action="{{ url('/expedientes') }}" method="post" class="mb-3">
    @csrf

    <!-- Campo de búsqueda por nombre -->
    <div class="mb-3">
        <label for="searchPaciente" class="form-label">Buscar Paciente</label>
        <input type="text" class="form-control" id="searchPaciente" list="pacienteList" placeholder="Ingrese nombre del paciente">
        <datalist id="pacienteList">
            @foreach($dat as $paciente)
                <option data-id="{{ $paciente->id }}" data-dui="{{ $paciente->DUI }}" value="{{ $paciente->nombre }}"></option>
            @endforeach
        </datalist>
    </div>

    <!-- Campo oculto para el ID del paciente -->
    <input type="hidden" name="id_Paciente" id="id_Paciente">

    <!-- Resto de los campos del expediente -->
    <div class="mb-3">
        <label for="antecedentes" class="form-label">Antecedentes</label>
        <textarea class="form-control" name="antecedentes" id="antecedentes">{{ old('antecedentes') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="alergias" class="form-label">Alergias</label>
        <textarea class="form-control" name="alergias" id="alergias">{{ old('alergias') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="medicamento" class="form-label">Medicamento</label>
        <textarea class="form-control" name="medicamento" id="medicamento">{{ old('medicamento') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="histquirurgico" class="form-label">Historial Quirúrgico</label>
        <textarea class="form-control" name="histquirurgico" id="histquirurgico">{{ old('histquirurgico') }}</textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    document.getElementById('searchPaciente').addEventListener('input', function() {
        var input = this.value;
        var list = document.getElementById('pacienteList').options;
        for (var i = 0; i < list.length; i++) {
            if (list[i].value === input) {
                document.getElementById('id_Paciente').value = list[i].dataset.id;
                break;
            }
        }
    });
</script>
