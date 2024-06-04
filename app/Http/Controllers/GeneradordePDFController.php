<?php
namespace App\Http\Controllers;
use App\Models\Receta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Adapter\PDFLib;

class GeneradordePDFController extends Controller
{
    public function generarPDF($id)
    {
        $receta = Receta::findOrFail($id);

        // Render del PDF
        $pdf = FacadePdf::loadView('recetas.pdf', compact('receta'));

        // Descarga el PDF
        return $pdf->stream('Receta.pdf');
    }
}
 
    
