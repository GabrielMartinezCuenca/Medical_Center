<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Auth;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        Patient::create(
            [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'born_date' => $request -> born_date,
                'avenue' => $request -> avenue,
                'number' => $request -> number,
                'city' => $request -> city,
                'region' => $request -> region,
                'information' => $request -> information,
                'user_id' => $user,
            ]
        );
        return redirect()->action([PatientController::class, 'index']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $patient->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
    }
}
