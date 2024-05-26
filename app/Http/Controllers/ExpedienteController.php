<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daatos['expedientes']=Expediente::paginate(5);
        return view('expedientes.index', $daatos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expedientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosExpediente = request()->except('_token');
        Expediente::insert($datosExpediente);
        //return response()->json($datosExpediente);

        //return redirect('expedientes')->with('mensaje', 'Empleado agregado con exito');

        return redirect('expedientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expediente  $Expediente
     * @return \Illuminate\Http\Response
     */
    public function show(Expediente $Expediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expediente  $Expediente
     * @return \Illuminate\Http\Response
     */
    public function edit($idExp)
    {
        //
        $Expediente=Expediente::findOrFail($idExp);
        return view ('expedientes.edit', compact('Expediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expediente  $Expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idExp)
    {
        //
        $datosExpediente = request()->except('_token', '_method');
        Expediente::where('idExp', '=', $idExp)->update($datosExpediente);

        $Expediente=Expediente::findOrFail($idExp);
        return view ('expedientes.edit', compact('Expediente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expediente  $Expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy($idExp)
    {
        //
        Expediente::destroy($idExp);
        return redirect('/expedientes');
    }
}
