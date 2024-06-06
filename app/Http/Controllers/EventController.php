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
        //
        $all_events = Event::with('paciente')->get();

        $events = [];

        foreach ($all_events as $event) {
            $events[] = [
                'title' => $event->paciente->nombre,
                'start' => $event->start_date,
                'end' => $event->end_date,
                'url' => '/events/show'
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

        //return redirect('pacientes')->with('mensaje', 'Empleado agregado con exito');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

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
        return redirect('/events');
    }
}
