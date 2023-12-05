@extends('layouts.landing')

@section('title', 'Citas')

@vite('resources/css/base/app.css','resources/js/app.js')
@vite('resources/js/calendar.js')
@vite('resources/js/listhour.js')
@vite('resources/css/base/header.css')
@vite('resources/css/base/footer.css')
@vite('resources/css/base/information.css')
@vite('resources/css/base/register.css')
@vite('resources/css/appointment/form.css')

@section('content')
    <div>
        <h1>Cita medica programa para el dia:  {{ $request -> date }}</h1>
    </div>
@endsection