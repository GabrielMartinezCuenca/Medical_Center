@extends('adminlte::page')

@section('title', 'Doctores')
@vite('resources/css/admin/form.css')

@section('content_header')
<h1>Doctores</h1>
@endsection

@section('content')
<div id="register">

    <div id="register-content">
        <h1>Editar Usuario</h1>
        <p>Nombre: {{ $user->name . " " . $user->lastname }}</p>
        {!!Form::model($user, ['route' => ['user.update', $user], 'method'=>'put'])  !!}
        @foreach ($roles as $role)
            <label for="">
                {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                {{ $role->name }}
            </label>
        @endforeach
        {!! Form::submit('Enviar información') !!}
        {!! Form::close() !!}


    </div>


    </div>
@endsection
