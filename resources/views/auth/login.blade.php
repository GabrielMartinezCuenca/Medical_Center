@extends('layouts.landing')

@section('title', 'home')

@vite('resources/css/base/app.css','resources/js/app.js')
@vite('resources/css/base/header.css')
@vite('resources/css/base/footer.css')
@vite('resources/css/base/information.css')
@vite('resources/css/base/register.css')
@vite('resources/css/auth/register.css')



@section('content')
<div id="register">

<div id="register-content">
    <img class="icon-logo" src="{{asset('assets/images/logo.png')}}" alt="">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
                <span class="alert-red">{{ $message }}</span>
            @enderror
        </div>
        
        <div>
            <input type="password" name="password" id="password" placeholder="Contraseña">
            @error('password')
                <span class="alert-red">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="Registrar usuario">

    </form>
</div>


</div>
@endsection





 
