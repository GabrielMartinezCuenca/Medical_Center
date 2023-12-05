<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = \App\Models\Request::where('status', 1)->get();
        return view('admin.appointment.index', compact('requests'));
    }

    public function appointmentConfirmed()
    {
        $requests = \App\Models\Request::where('status', 2)->get();
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
                'information' => $request -> information,
                'patient_id' => $request -> patient_id
            ]
            );
        
        return redirect()->action([AppointmentController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Request $appointment)
    {
        return view('admin.appointment.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    public function statusChange($id)
    {
        $request = Request::find($id);
        $request -> update(
            ['status' => 2],
        );
        return redirect()->action([AppointmentController::class, 'index']);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $appointment)
    {
        $appointment -> delete();
        return redirect()->action([AppointmentController::class, 'index']);

    }
}
