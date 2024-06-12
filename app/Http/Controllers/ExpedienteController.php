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
         $request->validate([
             'id_Paciente' => 'required|exists:pacientes,id',
             'antecedentes' => 'nullable|string|max:255',
             'alergias' => 'nullable|string|max:255',
             'medicamento' => 'nullable|string|max:255',
             'histquirurgico' => 'nullable|string|max:255',
         ], [
             'id_Paciente.required' => 'El ID del paciente es obligatorio.',
             'id_Paciente.exists' => 'El ID del paciente no existe en la base de datos de pacientes.',
         ]);
     
         // Verificar si el DUI ya está registrado en expedientes
         if (Expediente::where('id_Paciente', $request->id_Paciente)->exists()) {
             return redirect()->back()->withInput()->withErrors(['id_Paciente' => 'Este paciente ya tiene un expediente registrado.']);
         }
     
         // Intentar crear el expediente
         try {
             Expediente::create([
                 'id_Paciente' => $request->id_Paciente,
                 'antecedentes' => $request->antecedentes,
                 'alergias' => $request->alergias,
                 'medicamento' => $request->medicamento,
                 'histquirurgico' => $request->histquirurgico,
             ]);
     
             return redirect('expedientes')->with('success_message', 'Expediente creado con éxito');
         } catch (\Exception $e) {
             return redirect()->back()->withInput()->withErrors(['error' => 'Error al crear el expediente.']);
         }
     }     
    // Resto de métodos del controlador...


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

