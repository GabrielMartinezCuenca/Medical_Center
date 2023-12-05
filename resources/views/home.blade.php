@extends('layouts.landing')

@section('title', 'home')

@vite('resources/css/base/app.css','resources/js/app.js')
@vite('resources/css/base/header.css')
@vite('resources/css/base/footer.css')
@vite('resources/css/base/information.css')
@vite('resources/css/base/register.css')



@section('content')
@include('layouts._partials.information')
@include('layouts._partials.register')
@endsection

