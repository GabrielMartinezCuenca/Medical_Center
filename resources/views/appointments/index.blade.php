@extends('layouts.landing')

@vite('resources/css/base/app.css','resources/js/app.js')
@vite('resources/css/base/header.css')
@vite('resources/css/base/footer.css')
@vite('resources/css/appointment/navbar.css')

@section('title', 'citas')

@section('content')
@include('layouts._partials.navbar')
@endsection
