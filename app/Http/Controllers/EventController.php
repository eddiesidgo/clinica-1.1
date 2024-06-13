<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_events = Event::with('paciente')->get();
    
        $events = [];
    
        foreach ($all_events as $event) {
            $nombre = $event->nombre ?? 'Sin nombre'; // Manejo de null
            $events[] = [
                'title' => $nombre,
                'start' => $event->start_date,
                'end' => $event->end_date,
                'url' => '/citas'
            ];
        } 
        return view('events.index', compact('events'));
    }

    public function pdf(){
        $citas=Event::all();
        $pdf = Pdf::loadView('events.pdf', compact('citas'));
        return $pdf->stream();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dat = Paciente::all();
        return view('events.create', compact('dat'));
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //
        $datosEvents = request()->except('_token');
        Event::insert($datosEvents);
        //return response()->json($datosPaciente);
        //return redirect('pacientes')->with('mensaje', 'Cita agregada con exito');

        return redirect('events');
    }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //$datos=Event::where('id', '=', $id)->get();
        $datos=Event::all();
        return view ('events.show', compact('datos'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $dat = Paciente::all(); // Aquí obtén los datos de los pacientes
        $editMode = true; // Estamos en modo edición
        return view('events.edit', compact('event', 'dat', 'editMode'));
    }
    
    public function update(Request $request, $id)
    {
        // Validación de los datos entrantes
        $validatedData = $request->validate([
            'DUI' => 'required|string|max:10',
            'nombre' => 'required|string|max:255',
            'event' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
    
        // Encuentra el evento y actualiza sus datos
        $event = Event::findOrFail($id);
        $event->update($validatedData);
    
        // Redirige a la lista de eventos con un mensaje de éxito
        return redirect('/events')->with('message', 'Evento actualizado con éxito');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //

        Event::destroy($id);
        return redirect('/events/show');
    }
}
