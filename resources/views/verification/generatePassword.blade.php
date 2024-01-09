@extends('layouts.landing')

@vite('resources/css/base/app.css','resources/js/app.js')
@vite('resources/css/base/header.css')
@vite('resources/css/base/footer.css')
@vite('resources/css/appointment/navbar.css')
@vite('resources/css/admin/doctor/createPassword.css')
@section('title', 'citas')

@section('content')
<div class="content">
    <form action="{{route('user.changePassword', $token)}}" method="POST" class="formulario">
        @csrf
        @method("PUT")
        <h2>Creación de contraseña para doctores</h2>
        <label for="">Correo Electronico</label>
            <input type="text" name="email" placeholder="Correo Electronico" name="Email" id="">
        <label for="">Contraseña</label>
            <input type="text" name="password" placeholder="Contraseña">
        <label for="">Confirmar contraseña</label>
            <input type="text" name="passwordConfirm" placeholder="Contraseña">
        <input type="submit" class="submit" value="Enviar">
    </form>
</div>

@endsection
