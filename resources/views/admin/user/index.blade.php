@extends('adminlte::page')

@section('title', 'Citas')
@vite('resources/css/admin/table.css')

@section('content_header')
<h1>Consultorios Médicos</h1>   
@endsection

@section('content')
<div class="option">
    <a href="{{route('consulting-room.create')}}">Nuevo Usuario</a>
</div>
<ul>
    <table>
        <thead>
            <th>Nº</th>
            <th>Consultorio</th>
            <th>Telefono</th>
            <th>Email</th>

            <th>Opciones</th>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->email}}</td>

                    <td>
                        <a class="success-buttom" href="">Actualizar</a>
                        <a class="danger-buttom" href="">Eliminar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><h4>No hay especialidades registradas</h4></td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
</ul>
@endsection
