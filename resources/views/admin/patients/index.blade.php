@extends('adminlte::page')

@section('title', 'Citas')
@vite('resources/css/admin/table.css')

@section('content_header')
<h1>Lista de citas</h1>   
@endsection

@section('content')
<ul>
    <table>
        <thead>
            <th>Nº</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>

            <th>Opciones</th>
        </thead>
        <tbody>
            @forelse ($patients as $patient)
                <tr>
                    <td>{{$patient->id}}</td>
                    <td>{{$patient->name}}</td>
                    <td>{{$patient->lastname}}</td>
                    <td>{{$patient->born_date}}</td>


                    <td>
                        <a class="success-buttom" href="">Ver información</a>
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
