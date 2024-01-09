@extends('layouts.landing')

@vite('resources/css/base/app.css', 'resources/js/app.js')
@vite('resources/css/base/header.css')
@vite('resources/css/base/footer.css')
@vite('resources/css/appointment/navbar.css')
@vite('resources/css/patient/card.css')

@section('title', 'citas')

@section('content')
    @include('layouts._partials.navbar')

    @can('home.patientscreate')
    <div class="options">
        <a class="patients-list-link" href="{{ route('home.patientscreate') }}">Crear nuevo familiar</a>
    </div>
    @endcan
    <ul class="patients-list">
        @can('home.patientsShow')
            @forelse ($patients as $patient)
                <li>
                    <div class="card">
                        <div>
                            <label for="">Nombre del paciente:</label>
                            <h1 class="name-card">{{ $patient->name . ' ' . Str::limit($patient->lastname, 10, '...') }}</h1>
                        </div>
                        <div class="information-section-card">
                            <label for="">Fecha de nacimiento: </label>
                            <p>
                                {{ \Carbon\Carbon::parse($patient->born_date)->format('d/m/Y') }}
                            </p>
                            <label for="">Dia de registro:</label>
                            <p>
                                {{\Carbon\Carbon::parse($patient->create_at)->format('d/m/Y') }}
                            </p>

                            <div class="actions">
                                <a class="buttom-success" href="{{ route('home.patientsShow', $patient->id) }}">Editar</a>
                                @can('home.patientDestroy')
                                    <a class="buttom-danger" href="#">Eliminar</a>
                                @endcan
                            </div>

                        </div>
                    </div>
                </li>
            @empty
                <h4>No tienes pacientes registrados</h4>
            @endforelse

        @endcan

    </ul>


@endsection
