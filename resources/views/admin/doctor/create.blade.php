@extends('adminlte::page')

@section('title', 'Doctores')
@vite('resources/css/admin/form.css')

@section('content')
<div id="register">

    <div id="register-content">
        <h1>Registrar Doctor</h1>
        <form action="{{ route('doctor.store') }}" method="POST">
            @csrf
            <div class="group">
                <div>
                    <label for="">Nombre</label>
                    <input type="text" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}">
                    @error('name')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Apellido</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Apellido" value="{{ old('lastname') }}">
                    @error('lastname')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Correo Electronico</label>
                    <input type="text" name="email" id="email" placeholder="Correo Electronico" value="{{ old('email') }}">
                    @error('email')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Télefono</label>
                    <input type="text" name="phone" id="phone" placeholder="Numero Telefonico" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="">Cédula profesional</label>
                    <input type="text" name="professional_license" id="professional_license" placeholder="Cedula profesional" value="{{ old('professional_license') }}">
                    @error('professional_license')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Universidad de egreso</label>
                    <input type="text" name="scholarship" id="scholarship" placeholder="Escuela proveniente:" value="{{ old('scholarship') }}">
                    @error('scholarship')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

                <div>
                    <label for="">Información</label>
                    <input type="text" name="information" id="information" placeholder="Informacion del medico" value="{{ old('information') }}">
                    @error('information')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>



        <div class="group">
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

        </div>


            <input type="submit" value="Registrar usuario">
        </form>
    </div>


    </div>
@endsection
