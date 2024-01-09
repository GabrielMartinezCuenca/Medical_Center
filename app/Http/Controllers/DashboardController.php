<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use App\Http\Requests\PrescriptionRequest;
use Event;
use Auth;
use Carbon\Carbon;
use App\Events\CreatePrescriptionEvent;

class DashboardController extends Controller
{
    public function _construct(){
        $this->middleware('can:dashboard.index')->only('index');
    }
    public function index()
    {
        $user = Auth::user();
        $doctor = $user->doctor;

        // Verifica si $doctor es null antes de acceder a su propiedad 'id'
        $doctorId = $doctor ? $doctor->id : null;

        if ($doctorId) {
            $requests = ModelsRequest::where('doctor_id', $doctorId)
            ->where('status', 2)
            ->paginate(10);


            $requestsDoctorCount = ModelsRequest::where('doctor_id', $doctorId)
            ->where('status', 2)
            ->count();

            $requestsDoctorCompletedCount = ModelsRequest::where('doctor_id', $doctorId)
            ->where('status', 3)
            ->count();
            $requestsDoctorCanceledCount = ModelsRequest::where('doctor_id', $doctorId)
            ->where('status', 4)
            ->count();
        }else{
            $requests = null;
            $requestsDoctorCount = null;
            $requestsDoctorCompletedCount = null;
            $requestsDoctorCanceledCount = null;
        }


        $requestsCount = ModelsRequest::where('status', '1')->count();
        $appointmentsCount = ModelsRequest::where('status', '2')->count();
        $appointmentsCompletedCount = ModelsRequest::where('status', '3')->count();
        $appointmentsCanceledCount = ModelsRequest::where('status', '4')->count();
        $patients = Patient::count();
        $doctors = Doctor::count();

        return view('admin.dashboard.index', compact(
            'requests',
            'requestsDoctorCount',
            'requestsDoctorCompletedCount',
            'requestsDoctorCanceledCount',
            'requestsCount',
            'appointmentsCount',
            'appointmentsCompletedCount',
            'appointmentsCanceledCount',
            'patients',
            'doctors'
        ));
    }

    public function prescription($appointmentId){
        $appointment = ModelsRequest::find($appointmentId);
        return view('admin.dashboard.prescriptionPanel', compact('appointment'));
    }

    public function prescriptionPanel($appointmentId){
        $appointment = ModelsRequest::find($appointmentId);
        return view('admin.dashboard.prescription', compact('appointment'));
    }

    public function prescriptionStore(PrescriptionRequest $request, $id)
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
        return redirect()->route('dashboard.prescription', $appointment->id);

    }

}
