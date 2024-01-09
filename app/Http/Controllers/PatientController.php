<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeInformationPatientRequest;
use App\Http\Requests\PatientRequest;
use App\Http\Requests\PatientAppointmentRequest;
use App\Models\Patient;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:patient.index')->only('index');
        $this->middleware('can:patient.create')->only('create', 'store');
        $this->middleware('can:patient.edit')->only('edit', 'update');
        $this->middleware('can:patient.destroy')->only('destroy');
    }
    public function index()
    {
        $patients = Patient::paginate(10);

        return view('admin.patients.index', compact('patients'));
    }


    public function create()
    {
        $estadosMexico = [
            'Selecciona tu Estado',
            'Aguascalientes',
            'Baja California',
            'Baja California Sur',
            'Campeche',
            'Chiapas',
            'Chihuahua',
            'Coahuila',
            'Colima',
            'Durango',
            'Guanajuato',
            'Guerrero',
            'Hidalgo',
            'Jalisco',
            'México',
            'Michoacán',
            'Morelos',
            'Nayarit',
            'Nuevo León',
            'Oaxaca',
            'Puebla',
            'Querétaro',
            'Quintana Roo',
            'San Luis Potosí',
            'Sinaloa',
            'Sonora',
            'Tabasco',
            'Tamaulipas',
            'Tlaxcala',
            'Veracruz',
            'Yucatán',
            'Zacatecas',
        ];
        $genders = ['Masculino', 'Femenino'];

        return view('admin.patients.create', compact('estadosMexico', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        Patient::create(
            [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'born_date' => $request->born_date,
                'avenue' => $request->avenue,
                'number' => $request->number,
                'city' => $request->city,
                'region' => $request->region,
                'information' => $request->information,
            ]
        );
        return redirect()->action([PatientController::class, 'index']);
    }

    public function patientCreateAppointment(PatientAppointmentRequest $request)
    {
        Patient::create(
            [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'born_date' => $request->born_date
            ]
        );
        $patients = Patient::all();
        return view('admin.appointment.create', compact('patients'));


        // return response()->json(['mensaje' => "XD"]);


    }


    public function edit(Patient $patient)
    {
        $estadosMexico = [
            'Selecciona tu Estado',
            'Aguascalientes',
            'Baja California',
            'Baja California Sur',
            'Campeche',
            'Chiapas',
            'Chihuahua',
            'Coahuila',
            'Colima',
            'Durango',
            'Guanajuato',
            'Guerrero',
            'Hidalgo',
            'Jalisco',
            'México',
            'Michoacán',
            'Morelos',
            'Nayarit',
            'Nuevo León',
            'Oaxaca',
            'Puebla',
            'Querétaro',
            'Quintana Roo',
            'San Luis Potosí',
            'Sinaloa',
            'Sonora',
            'Tabasco',
            'Tamaulipas',
            'Tlaxcala',
            'Veracruz',
            'Yucatán',
            'Zacatecas',
        ];
        $genders = ['Masculino', 'Femenino'];

        return view('admin.patients.edit', compact('estadosMexico', 'patient', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $patient->update($request->all());
        return redirect()->action([PatientController::class, 'index']);
    }

    public function changeInformation(ChangeInformationPatientRequest $request, $id)
    {
        $appointment = \App\Models\Request::find($id);
        $patient = Patient::find($appointment->patient->id);
        $peso = $request->weight;
        $altura = $request->height;
        if($altura!=null|$altura!=0){
            $imc = ($peso / (pow($altura, 2)));
            $imc = number_format($imc, 3);
        }else{
            $imc = null;
        }

        $patient->update(
            [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'born_date' => $request->born_date,
                'weight' => $request->weight,
                'height' => $request->height,
                'gender' => $request->gender,
                'IMC' => $imc,
                'temperature' => $request->temperature,
                'blood_pressure' => $request->blood_pressure,
            ]
        );
        $appointment = \App\Models\Request::find($id);

//        return view('admin.appointment.show', compact('appointment'));
         return redirect()->route('appointment.show', $appointment->id);
    }

    public function changeInformationP(Request $request, $id)
    {
        $appointment = \App\Models\Request::find($id);
        $patient = Patient::find($appointment->patient->id);
        $peso = $request->weight;
        $altura = $request->height * 100;
        $imc = ($peso / (pow($altura, 2)));
        $patient->update(
            [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'born_date' => $request->born_date,
                'weight' => $request->weight,
                'height' => $request->height,
                'gender' => $request->gender,
                'IMC' => $imc,
                'temperature' => $request->temperature,
                'blood_pressure' => $request->blood_pressure,
            ]
        );
        $appointment = \App\Models\Request::find($id);
        return redirect()->route('appointment.prescription', $appointment->id);

        //return view('admin.appointment.prescription', compact('appointment'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->action([PatientController::class, 'index']);
    }
}
