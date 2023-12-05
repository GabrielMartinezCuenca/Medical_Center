@extends('adminlte::page')

@section('title', 'Doctores')
@vite('resources/css/admin/form.css')

@section('content_header')
<h1>Doctores</h1>   
@endsection

@section('content')
<div id="register">

    <div id="register-content">
        <h1>Registrar nuevo consultorio medico</h1>
        <form action="{{ route('consulting-room.store') }}" method="POST">
            @csrf
                <div>
                    <input type="text" name="name" id="name" placeholder="Nombre del consultorio" value="{{ old('name') }}">
                    @error('name')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input type="text" name="location" id="location" placeholder="location" value="{{ old('location') }}">
                    @error('location')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
    
            <div>
                <input type="text" name="phone" id="phone" placeholder="Telefono" value="{{ old('phone') }}">
                @error('phone')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="">Especialidad:</label>
                <select name="especiality" id="especiality">
                    @forelse ($especialities as $especiality)
                    <option value="{{ $especiality->id }}" {{ old('especiality_id') == $especiality->id ? 'selected' : '' }}>{{ $especiality->especiality }}</option>
                    @empty
                    <option value="0">No hay especialidades registradas</option>
                    @endforelse
               
                </select>
                @error('especiality_id')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
        <div class="group">
            <div>
                <label for="">Horario de entrada</label>

                <input type="time" name="schedule_start" id="schedule" placeholder="Horario de inicio" value="{{ old('schedule_start') }}">
                @error('schedule_start')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="">Horario de salida</label>

                <input type="time" name="schedule_end" id="schedule" placeholder="Horario de salida" value="{{ old('schedule_end') }}">
                @error('schedule_end')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            
        </div>
            <div>
                <input type="text" name="services" id="services" placeholder="Servicios" value="{{ old('services') }}">
                @error('services')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="text" name="information" id="information" placeholder="Información" value="{{ old('information') }}">
                @error('services')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>


            <input type="submit" value="Registrar Especialidad">
        </form>
    </div>
    
    
    </div>
@endsection
