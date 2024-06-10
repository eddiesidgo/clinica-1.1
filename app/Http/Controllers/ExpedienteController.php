<?php
namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Models\Paciente;

class ExpedienteController extends Controller
{
    public function index()
    {
        $datos['expedientes'] = Expediente::with('paciente')->paginate(5);
        return view('expedientes.index', $datos);
    }

    public function create()
    {
        $dat = Paciente::all();
        return view('expedientes.create', compact('dat'));
    }
    public function store(Request $request)
    {
        // Validar y obtener el ID del paciente
        $request->validate([
            'DUI' => 'required|string',
            'nombre' => 'required|string',
            'antecedentes' => 'nullable|string',
            'alergias' => 'nullable|string',
            'medicamento' => 'nullable|string',
            'histquirurgico' => 'nullable|string',
        ]);
    
        // Obtener el paciente asociado usando la relación definida en el modelo
        $paciente = Paciente::where('nombre', $request->input('nombre'))->first();
    
        if (!$paciente) {
            return back()->withErrors(['nombre' => 'Paciente no encontrado.']);
        }
    
        // Construir los datos del expediente con el ID del paciente
        $datosExpediente = $request->except('_token');
        $datosExpediente['id'] = $paciente->id;
    
        // Insertar el expediente en la base de datos
        Expediente::create($datosExpediente);
    
        return redirect('expedientes');
    }
    

    public function show(Expediente $expedientes)
    {
        return redirect('expedientes');
    }

    public function edit($id)
    {
        $expediente = Expediente::with('paciente')->findOrFail($id);
        $dat = Paciente::all();
        return view('expedientes.edit', compact('expediente', 'dat'));
    }

    public function update(Request $request, $idExp)
{
    // Validar y obtener el ID del paciente
    $request->validate([
        'DUI' => 'required|string',
        'nombre' => 'required|string',
        'antecedentes' => 'nullable|string',
        'alergias' => 'nullable|string',
        'medicamento' => 'nullable|string',
        'histquirurgico' => 'nullable|string',
    ]);

    $nombrePaciente = $request->input('nombre_Paciente');
    $paciente = Paciente::where('nombre', $nombrePaciente)->first();

    if (!$paciente) {
        return back()->withErrors(['nombre_Paciente' => 'Paciente no encontrado.']);
    }

    $datosExpediente = $request->except('_token', 'nombre_Paciente');
    $datosExpediente['id_Paciente'] = $paciente->id;

    $expediente = Expediente::findOrFail($idExp);
    $expediente->update($datosExpediente);

    return redirect('/expedientes')->with('mensaje', 'Expediente actualizado con éxito');
}

    public function destroy($idExp)
    {
        Expediente::destroy($idExp);
        return redirect('/expedientes');
    }
}
