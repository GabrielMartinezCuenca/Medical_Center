<?php

namespace App\Http\Controllers;
use App\Events\CreateAppointmentEvent;
use App\Http\Requests\PatientRequest;
use App\Http\Requests\RequestRequest;
use App\Models\Patient;
use App\Models\Request;
use App\Policies\HomePolicy;

use Auth;
use Event;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{


    
    public function requests()
    {
        if (Auth::check()) {
            $requests = Request::join('patients', 'requests.patient_id', '=', 'patients.id')
    ->join('users', 'patients.user_id', '=', 'users.id')
    ->where('users.id', Auth::user()->id)
    ->where('requests.status', 1)  
    ->distinct()
    ->get(['requests.*']);

            return view('appointments.appointments', compact('requests'));
        } else {
            return view('appointments.appointments');
        }
    }

    public function requestHistory()
    {
        if (Auth::check()) {
            $requests = Request::join('patients', 'requests.patient_id', '=', 'patients.id')
    ->join('users', 'patients.user_id', '=', 'users.id')
    ->where('users.id', Auth::user()->id)
    ->where('requests.status', '>' ,2)  
    ->distinct()
    ->get(['requests.*']);
    
            return view('appointments.history', compact('requests'));
        } else {
            return view('appointments.history');
        }
    }

    public function requestsCreate()
    {
        $schedule = [
            "9:00 AM", "9:30 AM", "10:00 AM", "10:30 AM",
            "11:00 AM", "11:30 AM", "12:00 PM", "12:30 PM",
            "1:00 PM", "1:30 PM", "2:00 PM", "2:30 PM",
            "3:00 PM", "3:30 PM", "4:00 PM", "4:30 PM",
            "5:00 PM", "5:30 PM", "6:00 PM", "6:30 PM",
            "7:00 PM", "7:30 PM", "8:00 PM"
        ];
        

        $patients = Patient::where('user_id', Auth::user()->id)->get();


        return view('appointments.create', compact('patients', 'schedule'));
    }


    public function requestStore(RequestRequest $request)
    {
        $hour = date('H:i:s', strtotime($request->hour));
        $appointment = Request::create(
            [
                'date' => $request->date,
                'hour' => $hour,
                'information' => $request -> information,
                'patient_id' => $request -> patient_id
            ]
        );

        Event::dispatch(new CreateAppointmentEvent($appointment));

        
        return redirect()->action([HomeController::class, 'requests']);
        
    }

    public function requestShow($appointment)
    {
        $request = Request::find($appointment);

        return view('appointments.show', compact('request'));
    }

    public function getHour($date) {
        $schedule = [
            "09:00", "09:30", "10:00", "10:30",
            "11:00", "11:30", "12:00", "12:30",
            "13:00", "13:30", "14:00", "14:30",
            "15:00", "15:30", "16:00", "16:30",
            "17:00", "17:30", "18:00", "18:30",
            "19:00", "19:30", "20:00"
        ];
    
        $dates = Request::where('date', $date)->pluck('hour')->toArray();
    
        $formattedDates = array_map(function ($time) {
            return date('H:i', strtotime($time));
        }, $dates);
    
        $availableHours = array_diff($schedule, $formattedDates);
    

        return response()->json(['mensaje' => implode(" ", $availableHours)]);
    }
    
    /*
        public function getHour($date) {
        $schedule = [
            "09:00", "09:30", "10:00", "10:30",
            "11:00", "11:30", "12:00", "12:30",
            "13:00", "13:30", "14:00", "14:30",
            "15:00", "15:30", "16:00", "16:30",
            "17:00", "17:30", "18:00", "18:30",
            "19:00", "19:30", "20:00"
        ];
    
        $dates = Request::where('date', $date)->pluck('hour')->toArray();
    
        $formattedDates = array_map(function ($time) {
            return date('H:i', strtotime($time));
        }, $dates);
    
        $availability = []; // Array para almacenar disponibilidad
    
        foreach ($schedule as $time) {
            // Comprueba si la hora está en $formattedDates (disponible) o no (no disponible)
            $availability[$time] = in_array($time, $formattedDates) ? 1 : 0;
        }
        return response()->json(['mensaje' => implode(", ", $availability)]);

    }
    
    
    
    */ 
    
    
    public function patients()
    {
        $patients = Patient::where('user_id', Auth::user()->id)->get();
        return view('patients.patients', compact('patients'));
    }

    public function patientsCreate()
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

        return view('patients.create', compact('estadosMexico'));
    }

    public function patientsStore(PatientRequest $request)
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
        return redirect()->action([HomeController::class, 'patients']);
        
    }

    public function patientsShow(Patient $patient)
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


        return view('patients.show', compact('patient', 'estadosMexico')); 
    }

    public function patientsUpdate(PatientRequest $request, Patient $patient)
    {
        $patient->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'born_date' => $request->born_date,
            'avenue' => $request->avenue,
            'number' => $request->number,
            'city' => $request->city,
            'region' => $request->region,
            'information' => $request->information,
        ]);
    
        return redirect()->action([HomeController::class, 'patients']);
    }
    
    public function patientDestroy(Patient $patient)
    {
        $patient -> delete();
    }


}