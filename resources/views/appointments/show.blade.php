@extends('layouts.landing')

@section('title', 'Citas')

@vite('resources/css/base/app.css','resources/js/app.js')
@vite('resources/css/base/header.css')
@vite('resources/css/base/footer.css')
@vite('resources/css/appointment/show.css')

@section('content')
   <div class="content">
    <div class="appointment-show">
        <h1>Fecha de cita médica:  {{ \Carbon\Carbon::parse($request -> date)->format('d-m-Y') }}</h1>
       <div class="appointment-content">
        <ul class="appointment-information">
            <h2>Información del paciente</h2>
            <li>Paciente: {{ $request->patient->name . " " .$request->patient->lastname }}</li>
            <li>Fecha de nacimiento: {{\Carbon\Carbon::parse($request->patient->born_date)->format('d-m-Y') }}</li>
            <li>Ubicación: {{ $request->patient->avenue . ", " .$request->patient->city.", ".$request->patient->region }}</li>
            <li>Peso (último registrio): {{ $request->patient->weight ? $request->patient->weight : "No registrado" ." (kg)" }} </li>
            <li>Altura (último registrio): {{ $request->patient->height ? $request->patient->height : "No registrado" ." (mts)" }} </li>
            <li>IMC (último registrio): {{ $request->patient->IMC ? $request->patient->IMC : "No registrado" }} </li>
            <li>Presión arterial (último registrio): {{ $request->patient->blood_pressure ? $request->patient->blood_pressure : "No registrado" . " (mm/Hg)" }} </li>
        </ul>
        <ul class="appointment-information">
            <h2>Información de la cita</h2>
            <li>Día: {{ \Carbon\Carbon::parse($request->date)->format('d-m-Y') }}</li>
            <li>Hora: {{ $request->hour }}</li>
            <li>Médico: {{ $request->doctor ? $request->doctor->name . " " . $request->doctor->lastname : "No registrado"}}</li>
            <li>Motivo de la cita: {{ $request->information }}</li>
            <li>Estatus: {{ $request->status }}</li>
        </ul>
        @if($request->status >= 2)
        <ul class="appointment-information">
            <h2>Recomendaciones</h2>
            <p>Diagnostico: {{ $request->prescription ? $request->prescription->treatment : "Sin información" }}</p>
            <p>Tratamient: {{ $request->prescription ?  $request->prescription->prescription : "Sin información" }}</p>
        </ul>
        @endif
       </div>

    </div>
   </div>
@endsection
