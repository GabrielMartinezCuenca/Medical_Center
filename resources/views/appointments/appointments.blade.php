@extends('layouts.landing')

@vite('resources/css/base/app.css','resources/js/app.js')
@vite('resources/css/base/header.css')
@vite('resources/css/base/footer.css')
@vite('resources/css/appointment/navbar.css')

@section('title', 'citas')

@section('content')
@include('layouts._partials.navbar')
<a href="{{route('home.requestsCreate')}}">Agendar cita</a>

@forelse ($requests as $request)
    <li>
        <a href="{{route('home.requestShow', $request->id)}}"><li>{{$request -> id . " " .$request -> date }}</li></a>
        <p>{{$request -> patient -> name . " " . $request -> patient -> lastname}}</p>
    </li>
   
@empty
    <h4>No tienes citas</h4>
@endforelse

@endsection
