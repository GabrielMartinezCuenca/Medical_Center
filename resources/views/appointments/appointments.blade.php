@extends('layouts.landing')

@vite('resources/css/base/app.css','resources/js/app.js')
@vite('resources/css/base/header.css')
@vite('resources/css/base/footer.css')
@vite('resources/css/appointment/appointments.css')
@vite('resources/css/appointment/navbar.css')

@section('title', 'citas')

@section('content')
@include('layouts._partials.navbar')
@can('home.requestsCreate')
<div class="options">
    <a href="{{route('home.requestsCreate')}}" class="patients-list-link">Agendar cita</a>
</div>
@endcan
@can('home.requestShow')
<div class="appointments-content">
    @forelse ($requests as $request)
    <div class="card">
        <h3 class="status">Cita ID {{ $request->id }} ({{ $request->appointment_status->name }})</h3>
        <h3 class="patient">Paciente: {{ $request->patient->name ." ". $request->patient->lastname }}</h3>
        <ul>
            <li>Dia: {{ \Carbon\Carbon::parse($request->date)->format('d-m-Y') }}</li>
            <li>Hora: {{ $request->hour }}</li>
            <li>Motivo: {{ $request->information }}</li>
            <li>Medico:
                @if ($request->patient_id == null)
                    No registrado
                @elseif ($request->doctor)
                    {{ $request->doctor->name ." ". $request->doctor->lastname }}
                @else
                    No registrado
                @endif
            </li>

        </ul>
        <a href="{{route('home.requestShow', $request->id)}}">Más información</a>
    </div>

    @empty
    <h4>No tienes citas</h4>
    @endforelse
    <div class="card-i">

    </div>
</div>
@endcan

@endsection
