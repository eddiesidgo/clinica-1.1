<?php
namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Event;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::all();
        return view('consultas.index', compact('consultas'));
    }

    // Método para mostrar el formulario de búsqueda
    public function buscarFormulario()
    {
        return view('consultas.buscar');
    }

    // Método para manejar la búsqueda y mostrar el resultado
    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');
        $paciente = Paciente::where('nombre', 'like', '%' . $nombre . '%')->first();

        if ($paciente) {
            $consultas = Consulta::with('paciente')->where('id_Cita', $paciente->id)->get();
            return view('consultas.resultado', compact('consultas', 'paciente'));
        } else {
            return redirect()->route('consultas.buscar')->with('error', 'Paciente no encontrado');
        }
    }

    // Método para generar el PDF
    public function generarPDF(Request $request)
{
    $nombre = $request->input('nombre');
    $paciente = Paciente::where('nombre', 'like', '%' . $nombre . '%')->first();

    if ($paciente) {
        $consultas = Consulta::with('paciente')->where('id_Cita', $paciente->id)->get();
        $pdf = Pdf::loadView('consultas.historial', compact('consultas', 'paciente')); // Aquí se carga la vista correcta
        return $pdf->stream();
    } else {
        return redirect()->route('consultas.buscar')->with('error', 'Paciente no encontrado');
    }
}

    // Métodos existentes
    public function consultar(){
        return view('consultas.consultar');
    }

    public function create()
    {
        $dat = Event::all();
        return view('consultas.create', compact('dat'));
    }

    public function show($idConsulta)
    {
        $consulta = Consulta::findOrFail($idConsulta);
        return view('consultas.show', compact('consulta'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_Cita' => 'required|exists:events,id',
            'diagnostico' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
        ]);

        Consulta::create($validatedData);

        return redirect('consultas')->with('mensaje', 'Consulta creada con éxito.');
    }

    public function edit($idConsulta)
    {
        $consulta = Consulta::findOrFail($idConsulta);
        $dat = Event::all();
        return view('consultas.edit', compact('consulta', 'dat'));
    }

    public function update(Request $request, $idConsulta)
    {
        $validatedData = $request->validate([
            'id_Cita' => 'required|exists:events,id',
            'diagnostico' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
        ]);

        $consulta = Consulta::findOrFail($idConsulta);
        $consulta->update($validatedData);

        return redirect('/consultas')->with('mensaje', 'Consulta actualizada con éxito');
    }

    public function destroy($id)
    {
        Consulta::destroy($id);
        return redirect('/consultas')->with('mensaje', 'Consulta eliminada con éxito');
    }
}
