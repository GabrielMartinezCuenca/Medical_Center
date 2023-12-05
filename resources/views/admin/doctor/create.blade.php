@extends('adminlte::page')

@section('title', 'Doctores')
@vite('resources/css/admin/form.css')

@section('content_header')
<h1>Doctores</h1>   
@endsection

@section('content')
<div id="register">

    <div id="register-content">
        <h1>Registrar Doctor</h1>
        <form action="{{ route('home.patientsStore') }}" method="POST">
            @csrf
            <div class="group">
                <div>
                    <input type="text" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}">
                    @error('name')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input type="text" name="lastname" id="lastname" placeholder="Apellido" value="{{ old('lastname') }}">
                    @error('lastname')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input type="text" name="email" id="email" placeholder="Correo Electronico" value="{{ old('email') }}">
                    @error('email')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input type="text" name="phone" id="phone" placeholder="Numero Telefonico" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>   
            </div>
    
                <div>
                    <input type="text" name="information" id="information" placeholder="Informacion del medico" value="{{ old('information') }}">
                    @error('information')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
              
                
          
            <div>
                <label for="">Consultorio:</label>
                <select name="consulting_room_id" id="consulting_room_id">
                    @foreach ($consulting_rooms as $consulting_room)
                        <option value="{{ $consulting_room->id }}" {{ old('consulting_room_id') == $consulting_room->id ? 'selected' : '' }}>{{ $consulting_room->name }}</option>
                    @endforeach
                </select>
                @error('consulting_room_id')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="">Especialidad:</label>
                <select name="medical_especiality_id" id="medical_especiality_id">
                    @foreach ($especialities as $especiality)
                        <option value="{{ $especiality->id }}" {{ old('medical_especiality_id') == $especiality->id ? 'selected' : '' }}>{{ $especiality->especiality }}</option>
                    @endforeach
                </select>
                @error('medical_especiality_id')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>

    
    
            <input type="submit" value="Registrar usuario">
        </form>
    </div>
    
    
    </div>
@endsection
