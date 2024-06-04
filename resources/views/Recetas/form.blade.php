<form method="POST" action="{{ route('recetas.store') }}">
    @csrf
    <div class="mb-3">
        <label for="DUI" class="form-label">Documento Único de Identidad:</label>
        <select class="form-control" name="DUI" id="DUI">
            @foreach($dat as $paciente)
                <option value="{{ $paciente->DUI }}" {{ old('DUI') == $paciente->DUI ? 'selected' : '' }}>
                    {{ $paciente->DUI }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="Paciente" class="form-label">Paciente:</label>
        <select class="form-control" name="Paciente" id="Paciente">
            @foreach($dat as $paciente)
                <option value="{{ $paciente->id }}" {{ old('Paciente') == $paciente->id ? 'selected' : '' }}>
                    {{ $paciente->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="Correo" class="form-label">Correo electrónico:</label>
        <select class="form-control" name="Correo" id="Correo">
            @foreach($dat as $paciente)
                <option value="{{ $paciente->correo_electronico }}" {{ old('Correo') == $paciente->correo_electronico ? 'selected' : '' }}>
                    {{ $paciente->correo_electronico }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="Receta" class="form-label">Receta médica:</label>
        <textarea class="form-control" name="Receta" id="Receta">{{ old('Receta') }}</textarea>
    </div>
    <div class="mb-3">
        <input class="btn btn-info" type="submit" value="Guardar Datos"/>
    </div>
</form>
