<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Models\Paciente;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['expedientes'] = Expediente::with('paciente')->paginate(5);
        return view('expedientes.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dat = Paciente::all();
        return view('expedientes.create', compact('dat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'DUI' => 'required|unique:expedientes|max:10',
            'nombre' => 'required|string|max:255',
            'antecedentes' => 'nullable|string|max:255',
            'alergias' => 'nullable|string|max:255',
            'medicamento' => 'nullable|string|max:255',
            'histquirurgico' => 'nullable|string|max:255',
            'id_Paciente' => 'required|exists:pacientes,id',
        ], [
            'DUI.unique' => 'Este DUI ya está registrado.',
            'DUI.required' => 'El DUI es obligatorio.',
            'DUI.max' => 'El DUI no debe exceder los :max caracteres.',
        ]);

        $datosExpediente = $request->except('_token');
        Expediente::insert($datosExpediente);
        return redirect('expedientes')->with('mensaje', 'Expediente creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expediente  $Expediente
     * @return \Illuminate\Http\Response
     */
    public function show(Expediente $expedientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idExp
     * @return \Illuminate\Http\Response
     */
    public function edit($idExp)
    {
        $expediente = Expediente::with('paciente')->findOrFail($idExp);
        $dat = Paciente::all(); // Asegúrate de que esta línea esté aquí
        return view('expedientes.edit', compact('expediente', 'dat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idExp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idExp)
    {
        $expediente = Expediente::findOrFail($idExp);
        $expediente->update($request->all());

        return redirect('/expedientes')->with('mensaje', 'Expediente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idExp
     * @return \Illuminate\Http\Response
     */
    public function destroy($idExp)
    {
        Expediente::destroy($idExp);
        return redirect('/expedientes');
    }
}

