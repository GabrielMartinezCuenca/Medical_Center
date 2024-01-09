<?php

namespace App\Http\Controllers;

use App\Events\CreatePrescriptionEvent;
use App\Http\Requests\PrescriptionRequest;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Event;

class PrescriptionController extends Controller
{


    public function store(PrescriptionRequest $request, $id)
    {
        $appointment = \App\Models\Request::find($id);
        $doctor = Auth::user();
        $actualDate = now()->format('Y-m-d H:i:s');
        $hour = Carbon::now()->format('H:i:s');

        $prescription = Prescription::create([
            'patient_id' => $appointment->patient_id,
            'doctor_id' => $doctor->id,
            'request_id' => $appointment->id,
            'treatment' => $request->treatment,
            'prescription' => $request->prescription,
            'date' => $actualDate,
            'hour' => $hour,
        ]);

        // Disparar el evento
        Event::dispatch(new CreatePrescriptionEvent($prescription, $appointment));

        // Redireccionar después de la descarga (este código no se ejecutará nunca debido a la descarga anterior)
        return redirect()->route('prescription.view', $appointment->id);

    }

    public function prescriptionPanel($id){
        $appointment = \App\Models\Request::find($id);
        return view('admin.appointment.prescriptionPanel', compact('appointment'));
    }


}
