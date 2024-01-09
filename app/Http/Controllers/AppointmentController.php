<?php

namespace App\Http\Controllers;

use App\Events\AppointmentDeleteEvent;
use App\Events\ConfirmAppointmentEvent;
use App\Http\Requests\AppointmentConsultingRoomRequest;
use App\Http\Requests\RequestRequest;
use App\Models\Appointment;
use App\Models\Consulting_room;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Request;
use Illuminate\Support\Facades\Event;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(){
        $this->middleware('can:appointment.index')->only('index');
        $this->middleware('can:appointment.create')->only('create', 'store');
        $this->middleware('can:appointment.show')->only('show');

        $this->middleware('can:appointment.destroy')->only('destroy');

     }
    public function index()
    {
        $doctors = Doctor::all();
        $consulting_rooms = Consulting_room::all();
        $requests = \App\Models\Request::where('status', 1)->orderBy('date', 'desc')->paginate(10);
        return view('admin.appointment.index', compact('requests', 'consulting_rooms', 'doctors'));
    }

    public function history()
    {
        $consulting_rooms = Consulting_room::all();
        $requests = \App\Models\Request::where('status', 3)->orderBy('date', 'desc')->paginate(10);
        return view('admin.appointment.history.history', compact('requests', 'consulting_rooms'));
    }
    public function canceled()
    {
        $consulting_rooms = Consulting_room::all();
        $requests = \App\Models\Request::where('status', 4)->orderBy('date', 'desc')->paginate(10);
        return view('admin.appointment.history.canceled', compact('requests', 'consulting_rooms'));
    }

    public function appointmentConfirmed()
    {
        $requests = \App\Models\Request::where('status', 2)
            ->orderBy('date', 'asc')
            ->orderBy('hour', 'asc')
            ->paginate(10);

        return view('admin.appointment.confirmed', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        return view('admin.appointment.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestRequest $request)
    {
        $hour = date('H:i:s', strtotime($request->hour));

        Request::create(
            [
                'date' => $request->date,
                'hour' => $hour,
                'information' => $request->information,
                'patient_id' => $request->patient_id
            ]
        );

        return redirect()->action([AppointmentController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Request $appointment)
    {
        $consulting_rooms = Consulting_room::all();
        $doctors = Doctor::all();
        return view('admin.appointment.show', compact('appointment', 'doctors'));
    }

    public function prescription(\App\Models\Request $appointment)
    {
        return view('admin.appointment.prescription', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function cancelAppointment($id)
    {
        $request = Request::find($id);
        $request->update(
            ['status' => 4],
        );
        if($request->patient->user->email){
            Event::dispatch(new AppointmentDeleteEvent($request));
        }
        return redirect()->action([AppointmentController::class, 'appointmentConfirmed']);
    }

    public function statusChange($id, AppointmentConsultingRoomRequest $request)
    {
        $appointment = Request::find($id);
        $appointment->update(
            [
                'status' => 2,
                'doctor_id' => $request->doctor_id
            ],
        );
        if (!empty($request->patient->user->email) && !empty($request->user_id)) {
            ConfirmAppointmentEvent::dispatch($request);
        }
        return redirect()->action([AppointmentController::class, 'index']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $appointment)
    {
        $appointment->delete();
        if ($appointment->patient->user->email) {
            Event::dispatch(new AppointmentDeleteEvent($appointment));
        }
        return redirect()->action([AppointmentController::class, 'index']);
    }
}
