@extends('adminlte::page')

@section('title', 'Doctores')
@vite('resources/css/admin/form.css')

@section('content_header')
<h1>Doctores</h1>   
@endsection

@section('content')
<div id="register">

    <div id="register-content">
        <h1>Registrar Doctor</h1>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="group">
                <div>
                    <input type="text" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}">
                    @error('name')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input type="text" name="lastname" id="lastname" placeholder="Apellido" value="{{ old('lastname') }}">
                    @error('lastname')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input type="text" name="email" id="email" placeholder="Correo Electronico" value="{{ old('email') }}">
                    @error('email')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input type="text" name="phone" id="phone" placeholder="Numero Telefonico" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>   
            </div>
     
            <div>
                <label for="type_user">Categoria:</label>
                <select name="type_user" id="type_user">
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" {{ old('type_user') == $category['id'] ? 'selected' : '' }}>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
                @error('type_user')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            

    
    
            <input type="submit" value="Registrar usuario">
        </form>
    </div>
    
    
    </div>
@endsection
