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
     */
    public function store(Request $request)
    {
        $datosExpediente = $request->except('_token');
        Expediente::insert($datosExpediente);
        return redirect('expedientes');
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

