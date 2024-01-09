

@extends('layouts.landing')

@section('title', 'home')

@vite('resources/css/base/app.css','resources/js/app.js')
@vite('resources/js/calendar.js')
@vite('resources/js/listhour.js')
@vite('resources/css/base/header.css')
@vite('resources/css/base/footer.css')
@vite('resources/css/base/information.css')
@vite('resources/css/base/register.css')
@vite('resources/css/appointment/form.css')



@section('content')
<div id="register">

<div id="register-content">
    <h1>Nueva Cita</h1>
    <form action="{{route('home.requestStore')}}" method="POST">
        @csrf

        <div class="group">
            @include('appointments._partials.calendar')
            @include('appointments._partials.schedule')
        </div>

        <div>
            <label for="">Detalle de la cita:</label>

            <input type="text" name="information" id="information" placeholder="Detalles de la cita" value="{{ old('information') }}">
            @error('information')
                <span class="alert-red">{{ $message }}</span>
            @enderror
        </div>
        <div class="group">
            <div>
                <label for="">Familiar:</label>
                <select name="patient_id" id="patient_id">
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>{{ $patient->name." ".$patient->lastname }}</option>
                    @endforeach
                </select>
                @error('patient_id')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>

        </div>



        <input type="submit" value="Registrar usuario">
    </form>
</div>


</div>
@endsection





