<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
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

    //Metodo para el pdf de consulta 

    public function pdf(){
        $consultas=Consulta::all();
        $pdf = Pdf::loadView('consultas.pdf', compact('consultas'));
        return $pdf->stream();
    }

    public function create()
    {
        $dat = Event::all();
        return view('consultas.create', compact('dat'));
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
