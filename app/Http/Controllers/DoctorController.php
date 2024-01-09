<?php

namespace App\Http\Controllers;

use App\Events\DoctorCreateEvent;
use App\Http\Requests\DoctorRequest;
use App\Models\Consulting_room;
use App\Models\Doctor;
use App\Models\Medical_especiality;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function __construct(){
        $this->middleware('can:doctor.index')->only('index');
        $this->middleware('can:doctor.create')->only('create','store');
        $this->middleware('can:doctor.edit')->only('edit','update');
        $this->middleware('can:doctor.destroy')->only('destroy');

    }
    public function index()
    {
        $doctors = Doctor::whereIn('status', [1, 2])->paginate(10);
        return view ('admin.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especialities = Medical_especiality::all();
        $consulting_rooms = Consulting_room::all();
        return view('admin.doctor.create', compact('especialities', 'consulting_rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {

        $doctor = Doctor::create(
           $request->all()
        );

        DoctorCreateEvent::dispatch($doctor);

        return redirect()->action([DoctorController::class, 'index']);
    }


    public function edit(Doctor $doctor)
    {
        $especialities = Medical_especiality::all();
        $consulting_rooms = Consulting_room::all();
        return view('admin.doctor.edit', compact('doctor', 'especialities', 'consulting_rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $doctor -> update($request -> all());
        return redirect()->action([DoctorController::class, 'index']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor -> delete();

        return redirect()->action([DoctorController::class, 'index']);

    }
}
