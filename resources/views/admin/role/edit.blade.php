@extends('adminlte::page')

@section('title', 'Doctores')
@vite('resources/css/admin/form.css')

@section('content')
<div id="register">

    <div id="register-content">
        <h1>Crear Rol</h1>
        {!! Form::model($role, ['route'=>['role.update', $role],'method' => 'put']) !!}
    <label for="">Nombre:</label>
    {!! Form::text('name', $role->name, ['placeholder'=>'Nombre del rol']) !!}
    @error('name')
        <label for="" class="alert-red">{{ $message }}</label>
    @enderror

    <label for="">Permisos</label>
    <div class="container-checkbox">
    @forelse ($permissions as $permission)
    <div class="item-checkbox">
        {!! Form::checkbox('permissions[]', $permission->id, in_array($permission->id, $role->permissions->pluck('id')->toArray()), []) !!}
        {{ $permission->description }}
    </div>
        @empty
        <label for="" class="alert-red">Sin registros</label>
    @endforelse
    </div>
    {!! Form::submit('Enviar Información', []) !!}
{!! Form::close() !!}


    </div>


    </div>
@endsection
