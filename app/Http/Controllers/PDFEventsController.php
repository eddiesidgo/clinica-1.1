<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFEventsController extends Controller
{
    public function generarPDF($id)
    {
        // Encuentra el evento por ID
        $event = Event::findOrFail($id);

        // Render del PDF
        $pdf = Pdf::loadView('events.ComprobantePDF', compact('event'));

        // Descarga el PDF
        return $pdf->stream('event.ComprobantePDF');
    }
}

 
    
