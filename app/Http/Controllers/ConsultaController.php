<?php
namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Event;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function create()
    {
        $dat = Event::all();
        return view('consultas.create', compact('dat'));
    }

    public function index()
    {
        $consultas = Consulta::with('event')->paginate(5);
        return view('consultas.index', compact('consultas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
public function updateEstado(Request $request, $id)
{
    $consulta = Consulta::find($id);
    if ($consulta) {
        $consulta->estado = $request->estado;
        $consulta->save();
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false]);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosConsulta = $request->except('_token');
        Consulta::create($datosConsulta);
        return redirect('consultas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idConsulta
     * @return \Illuminate\Http\Response
     */
    public function edit($idConsulta)
{
    try {
        $consulta = Consulta::with('event')->findOrFail($idConsulta);
        $dat = Event::all(); // Esta línea obtiene todos los eventos para pasar a la vista
        return view('consultas.edit', compact('consulta', 'dat'));
    } catch (\Exception $e) {
        // Manejar el error aquí
        return redirect()->back()->with('error', 'Consulta no encontrada');
    }
}

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idConsulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idConsulta)
    {
        $consulta = Consulta::findOrFail($idConsulta);
        $consulta->update($request->all());

        return redirect('/consultas')->with('mensaje', 'Consulta actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idConsulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($idConsulta)
    {
        Consulta::destroy($idConsulta);
        return redirect('/consultas');
    }
}
