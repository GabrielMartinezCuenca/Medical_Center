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
        <h4>Solicitud Nº {{$appointment -> id}}</h4>
        <h4>Paciente: {{$appointment -> patient -> name }} {{$appointment -> patient -> lastname}}</h4>
        <p>Fecha de nacimiento del paciente: {{$appointment -> patient -> born_date}}</p>
        <p>Correo Electronico: {{$appointment -> patient -> user -> email}}</p>
        <p>Telefono: {{$appointment -> patient -> user -> phone}}</p>

    </div>
    
    
    </div>
@endsection
