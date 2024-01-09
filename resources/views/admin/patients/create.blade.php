@extends('adminlte::page')

@section('title', 'Doctores')
@vite('resources/css/admin/form.css')

@section('content')
<div id="register">

    <div id="register-content">
        <h1>Registrar nuevo paciente</h1>
        <form action="{{ route('patient.store') }}" method="POST">
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
                    <label for="">Fecha de Nacimiento</label>
                    <input type="date" name="born_date" id="born_date" placeholder="Fecha de nacimiento" value="{{old('born_date')}}">
                    @error('born_date')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Genero</label>
                    <select name="gender" id="gender">
                        @foreach ($genders as $gender)
                            <option value="{{ old('gender') }}">{{ $gender }}</option>
                        @endforeach
                    </select>                    @error('gender')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="group">
                <div>
                    <label for="">Calle</label>
                    <input type="text" name="avenue" id="avenue" placeholder="Calle" value="{{ old('avenue') }}">
                    @error('avenue')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="">Número</label>
                    <input type="text" name="number" id="number" placeholder="Numero" value="{{ old('number') }}">
                    @error('avenue')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="group">
                <div>
                    <label for="">Peso</label>
                    <input type="text" name="weight" id="weight" placeholder="Peso (Kilogramos)" value="{{ old('weight') }}">
                    @error('weight')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="">Estatura</label>
                    <input type="text" name="height" id="height" placeholder="Estatura (Metros)"  value="{{ old('height') }}">
                    @error('height')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
            </div>



            <div class="group">
                <div>
                    <label for="">Temperatura</label>
                    <input type="text" name="temperature" id="temperature" placeholder="Temperatura" value="{{ old('temperature') }}">
                    @error('temperature')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="">Presión arterial</label>
                    <input type="text" name="blood_pressure" id="blood_pressure" placeholder="Presión arterial"  value="{{ old('blood_pressure') }}">
                    @error('blood_pressure')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="group">
                <div>
                    <label for="">Ciudad</label>
                    <input type="text" name="city" id="city" placeholder="Ciudad" value="{{ old('city') }}">
                    @error('city')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Estado</label>
                    <select name="region" id="region">
                        @foreach ($estadosMexico as $estado)
                            <option value="{{ old('region') }}" >{{ $estado }}</option>
                        @endforeach
                    </select>
                    @error('region')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div>
                <label for="">Información general</label>
                <input type="text" name="information" id="information" placeholder="Referencias (opcional)" value="{{ old('information') }}">
                @error('information')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>


            <input type="submit" value="Registrar usuario">
        </form>
    </div>



    </div>
@endsection
