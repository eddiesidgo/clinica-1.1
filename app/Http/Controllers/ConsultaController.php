<?php
namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Event;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function create()
    {
        $events = Event::all();
        return view('consultas.create', compact('events'));
    }

    public function updateEstado(Request $request, $idConsulta)
    {
        $consulta = Consulta::findOrFail($idConsulta);
        $consulta->estado = $request->estado;
        $consulta->save();
    
        return response()->json(['success' => true]);
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
        $consulta = Consulta::with('event')->findOrFail($idConsulta);
        $events = Event::all();
        return view('consultas.edit', compact('consulta', 'events'));
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
