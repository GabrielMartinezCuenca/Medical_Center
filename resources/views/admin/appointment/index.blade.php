@extends('adminlte::page')

@section('title', 'Citas')
@vite('resources/css/admin/table.css')
@vite('resources/css/admin/modal.css')

@section('content_header')
<h1>Lista de citas</h1>   
@endsection

@section('content')
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
                    <td>{{$request->id}}</td>
                    <td>{{Str::limit($request -> patient -> name . " " . $request -> patient -> lastname, 25)}}</td>
                    <td>{{$request->date}}</td>
                    <td>{{$request->hour}}</td>

                    <td>
                        <a class="danger-buttom" href="{{route('appointment.show', $request->id)}}">Ver solicitud</a>
                        <a class="success-buttom" href="#" onclick="mostrarModal('{{ $request->id }}')">Confirmar Cita</a>
                        <a class="danger-buttom" href="#" onclick="mostrarModalDelete('{{ $request->id }}')">Cancelar Solicitud</a>
                    </td>
                </tr>

                <!-- Modal para confirmar el cambio de estatus -->
                <div id="modal{{ $request->id }}" class="modal-container">
                    <div class="modal-content">
                        <span class="close" onclick="cerrarModal('{{ $request->id }}')">&times;</span>
                        <p>¿Estás seguro que deseas confirmar esta cita?</p>
                        <div class="modal-buttons">
                            <form name="formularioeliminar" action="{{ route('appointment.statusChange', $request->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit">Agendar</button>
                            </form>
                            
                            <button class="cancel" onclick="cerrarModal('{{ $request->id }}')">Cancelar</button>
                        </div>
                    </div>
                </div>

                <!-- Modal para confirmar la eliminacion -->
                <div id="modalDelete{{ $request->id }}" class="modal-container">
                    <div class="modal-content">
                        <span class="close" onclick="cerrarModalDelete('{{ $request->id }}')">&times;</span>
                        <p>¿Estás seguro que deseas eliminar esta solicitud?</p>
                        <div class="modal-buttons">
                            <form name="formularioeliminar" action="{{ route('appointment.destroy', $request) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                            
                            <button class="cancel" onclick="cerrarModalDelete('{{ $request->id }}')">Cancelar</button>
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="4"><h4>No hay especialidades registradas</h4></td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
</ul>

<script>
    function mostrarModal(id) {
        var modal = document.getElementById('modal' + id);
        modal.style.display = 'flex';
    }

    function cerrarModal(id) {
        var modal = document.getElementById('modal' + id);
        modal.style.display = 'none';
    }

    function eliminarConsultorio(id) {
        // Agrega aquí la lógica para eliminar el consultorio
        cerrarModal(id);
    }

    function mostrarModalDelete(id) {
        var modal = document.getElementById('modalDelete' + id);
        modal.style.display = 'flex';
    }

    function cerrarModalDelete(id) {
        var modal = document.getElementById('modalDelete' + id);
        modal.style.display = 'none';
    }

    function eliminarConsultorioDelete(id) {
        // Agrega aquí la lógica para eliminar el consultorio
        cerrarModal(id);
    }
</script>
@endsection
