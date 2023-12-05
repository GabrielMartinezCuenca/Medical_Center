

@extends('layouts.landing')

@section('title', 'home')

@vite('resources/css/base/app.css','resources/js/app.js')
@vite('resources/css/base/header.css')
@vite('resources/css/base/footer.css')
@vite('resources/css/base/information.css')
@vite('resources/css/base/register.css')
@vite('resources/css/patient/form.css')



@section('content')
<div id="register">

<div id="register-content">
    <h1>Actualizar Información</h1>
    <form action="{{ route('home.patientsUpdate', ['patient' => $patient]) }}" method="POST">
        @csrf
        @method('put')
        <div class="group">
            <div>
                <input type="text" name="name" id="name" placeholder="Nombre" value="{{ $patient->name }}">
                @error('name')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="text" name="lastname" id="lastname" placeholder="Apellido" value="{{ $patient -> lastname }}">
                @error('lastname')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="">Fecha de Nacimiento</label>
                <input type="date" name="born_date" id="born_date" placeholder="Fecha de nacimiento" value="{{ $patient->born_date }}">
                @error('born_date')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="group">
            <div>
                <input type="text" name="avenue" id="avenue" placeholder="Calle" value="{{ $patient->avenue }}">
                @error('avenue')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
          
            <div>
                <input type="text" name="number" id="number" placeholder="Numero" value="{{ $patient->number }}">
                @error('avenue')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>    
        </div>
        <div class="group">
            <div>
                <input type="text" name="city" id="city" placeholder="Ciudad" value="{{ $patient->city }}">
                @error('city')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <select name="region" id="region">
                    @foreach ($estadosMexico as $estado)
                        <option value="{{ $estado }}" {{ $patient->region == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                    @endforeach
                </select>
                @error('region')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            
        </div>
        
        <div>
            <input type="text" name="information" id="information" placeholder="Referencias (opcional)" value="{{ $patient->information }}">
            @error('information')
                <span class="alert-red">{{ $message }}</span>
            @enderror
        </div>


        <input type="submit" value="Actualizar">
    </form>
</div>


</div>
@endsection





