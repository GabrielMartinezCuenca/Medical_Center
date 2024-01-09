@extends('adminlte::page')

@section('title', 'Citas')
@vite('resources/css/admin/table.css')
@vite('resources/css/admin/modal.css')

@section('content')
<ul>
    <div class="option">
        <a href="{{route('appointment.create')}}">Nueva Solicitud</a>
    </div>
    <ul>
        <table>
            <thead>
                <th>Nº</th>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @forelse ($requests as $request)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{Str::limit($request -> patient -> name . " " . $request -> patient -> lastname, 25)}}</td>
                        <td>{{$request->date}}</td>
                        <td>{{$request->hour}}</td>

                        <td>
                            <a class="danger-buttom" href="{{route('appointment.show', $request->id)}}">Ver Cita</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"><h4>No hay especialidades registradas</h4></td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </ul>

</ul>
@endsection
