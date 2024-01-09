<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function pdfGenerate(ModelsRequest $appointment){
        $pdf = Pdf::loadView('pdf.prescription', compact('appointment'));
        return $pdf->download('cita'.$appointment->id.'-'.$appointment->patient->name.'-'.$appointment->date.'.pdf');
    }
}
