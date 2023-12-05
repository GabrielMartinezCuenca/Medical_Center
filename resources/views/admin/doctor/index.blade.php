@extends('adminlte::page')

@section('title', 'Doctores')

@section('content_header')
<h1>Doctores</h1>   
@endsection

@section('content')
<div class="option">
    <a href="{{route('doctor.create')}}">Nuevo Doctor</a>
</div>
<ul>
    <table>
        <thead>
            <th>Nº</th>
            <th>Consultorio</th>
            <th>Descripcion</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @forelse ($doctors as $doctor)
                <tr>
                    <td>{{$doctor->id}}</td>
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->description}}</td>
                    <td>
                        <a href="">Actualizar</a>
                        <a href="">Eliminar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><h4>No hay medicos registrados</h4></td>
                </tr>
            @endforelse
        </tbody>
    </table>
</ul>
@endsection
