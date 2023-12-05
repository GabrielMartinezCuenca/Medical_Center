@extends('adminlte::page')

@section('title', 'Doctores')
@vite('resources/css/admin/form.css')
@vite('resources/js/calendar.js')
@vite('resources/js/listhour.js')
@vite('resources/css/admin/appointment/calendar.css')
@section('content_header')
<h1>Doctores</h1>   
@endsection

@section('content')
<div id="register">

    <div id="register-content">
        <h1>Nueva Cita</h1>
        <form action="{{route('appointment.store')}}" method="POST">
            @csrf
    
            <div class="group">
                @include('admin.appointment._partials.calendar')
                @include('admin.appointment._partials.schedule')
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
