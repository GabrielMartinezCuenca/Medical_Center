@extends('layouts.landing')

@vite('resources/css/base/app.css','resources/js/app.js')
@vite('resources/css/base/header.css')
@vite('resources/css/base/footer.css')
@vite('resources/css/appointment/navbar.css')
@vite('resources/css/patient/card.css')

@section('title', 'citas')

@section('content')
@include('layouts._partials.navbar')

<a class="patients-list-link" href="{{route('home.patientscreate')}}">Crear nuevo familiar</a>
<ul class="patients-list">
@forelse ($patients as $patient)
        <li>
                <div class="card">
                    <div>
                        <label for="">Nombre del paciente:</label>
                        <h1 class="name-card">{{$patient -> name . " " . Str::limit($patient->lastname, 10, '...')}}</h1>
                    </div>
                    <div class="information-section-card">
                        <label for="">Fecha de nacimiento: </label>
                        <p>
                            {{$patient -> born_date}}
                        </p>
                        <label for="">Dia de registro:</label>
                        <p>
                            {{$patient -> created_at}}
                        </p>
                       
                        <div class="actions">
                            <a class="buttom-success" href="{{route('home.patientsShow', $patient->id)}}">Editar</a>
                            <a class="buttom-danger" href="#">Eliminar</a>      
                        </div>
                        
                    </div>
                    </div>
        </li>
@empty
    <h4>No tienes pacientes registrados</h4>
@endforelse
</ul>


@endsection
