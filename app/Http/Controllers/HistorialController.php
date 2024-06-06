<?php
namespace App\Http\Controllers;

use App\Models\HistorialConsulta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HistorialController extends Controller
{
    public function index()
    {
        // Return the view for the historial consulta
        return view('historial.index');
    }

    public function GenerarPDF(){
        $historial = HistorialConsulta::all();
        $pdf = PDF::loadView('historial.pdf', compact('historial'));
        return $pdf->stream();
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nombre_paciente' => 'required|string|max:255',
    ]);

    $historial = HistorialConsulta::where('nombre_paciente', $validatedData['nombre_paciente'])->get();

    if ($historial->count() > 0) {
        $pdf = PDF::loadView('historial.pdf', compact('historial'));
        return $pdf->stream();
    } else {
        return back()->with('mensaje', 'Paciente no encontrado');
    }
}

public function show($idConsulta)
{
    $query = HistorialConsulta::where('idConsulta', $idConsulta);
    dd($query->toSql(), $query->getBindings()); // <--- Add this line
    $historialConsulta = $query->first();
    //...
}
    public function GenerarPDFNombre(Request $request){
        $historial = HistorialConsulta::find($request->nombre);
        if ($historial){
            $pdf = PDF::loadView('historial.pdf', compact('historial'));
            return $pdf->stream();
        }else{
            return back()->with('mensaje', 'Paciente no encontrado');
        }
    }
}