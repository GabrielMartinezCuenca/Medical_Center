@extends('adminlte::page')
@section('title', 'Especialidad Medica')
@vite('resources/css/admin/form.css')



@section('content')

<div id="register">
    <div id="register-content">
        <h1>Registrar nueva especialidad médica</h1>
        <form action="{{ route('especiality.update', $medical_especiality -> id) }}" method="POST">
            @csrf
            @method('PUT')
                <div>
                    <label for="">Nombre de la especialidad:</label>
                    <input type="text" name="especiality" id="especiality" placeholder="Nombre de Especialidad" value="{{$medical_especiality->especiality }}">
                    @error('especiality')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Descripción (opcional)</label>
                    <input type="text" name="description" id="description" placeholder="Descripción" value="{{ $medical_especiality -> description}}">
                    @error('description')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>

            <input type="submit" value="Registrar Especialidad">
        </form>
    </div>
</div>
@endsection
