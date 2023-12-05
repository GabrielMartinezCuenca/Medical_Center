@extends('adminlte::page')

@section('title', 'Citas')

@section('content_header')
<h1>Lista de citas</h1>   
@endsection

@section('content')
<ul>
    @forelse ($requests as $request)
        <li>
            {{$request -> date}} Paciente: {{$request -> patient -> name}}
        </li>
    @empty
        <h4>Sin citas disponibles</h4>
    @endforelse
</ul>
@endsection
