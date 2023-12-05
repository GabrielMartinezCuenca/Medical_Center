

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
    <h1>Registrar nuevo familiar</h1>
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
                <label for="">Fecha de Nacimiento</label>
                <input type="date" name="born_date" id="born_date" placeholder="Fecha de nacimiento" value="{{ old('born_date') }}">
                @error('born_date')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="group">
            <div>
                <input type="text" name="avenue" id="avenue" placeholder="Calle" value="{{ old('avenue') }}">
                @error('avenue')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
          
            <div>
                <input type="text" name="number" id="number" placeholder="Numero" value="{{ old('number') }}">
                @error('avenue')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>    
        </div>
        <div class="group">
            <div>
                <input type="text" name="city" id="city" placeholder="Ciudad" value="{{ old('city') }}">
                @error('city')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <select name="region" id="region">
                    @foreach ($estadosMexico as $estado)
                        <option value="{{ $estado }}" {{ old('region') == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                    @endforeach
                </select>
                @error('region')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            
        </div>
        
        <div>
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





