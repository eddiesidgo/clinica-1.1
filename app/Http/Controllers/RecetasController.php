<?php
namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\Paciente;
use Illuminate\Http\Request;


class RecetasController extends Controller
{
    public function index()
    {
        $Datos['Recetas'] = Receta::paginate(5);
        return view('Recetas.index', $Datos);
    }

    public function create()
    {
        $dat = Paciente::all(); // Obtén todos los pacientes
        return view('recetas.create', compact('dat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'DUI' => 'required',
            'Paciente' => 'required',
            'Correo' => 'required',
            'Receta' => 'required',
        ]);

        $codigo = Receta::generateCodigo();
        $firma = Receta::generateFirma();

        Receta::create([
            'Paciente' => $request->input('Paciente'),
            'DUI' => $request->input('DUI'),
            'correo_electronico' => $request->input('Correo'),
            'Receta' => $request->input('Receta'),
            'codigo' => $codigo,
            'firma' => $firma,
        ]);

        return redirect()->route('recetas.index')->with('success', 'Receta creada con éxito');
    }

    public function show(Receta $receta)
    {
        return view('Recetas.show', compact('receta'));
    }

    public function destroy($id)
    {
        Receta::destroy($id);
        return redirect()->route('Recetas.index')->with('success', 'Receta eliminada con éxito');
    }
}
