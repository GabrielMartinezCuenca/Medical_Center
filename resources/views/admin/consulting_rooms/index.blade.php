@extends('adminlte::page')

@section('title', 'Citas')
@vite('resources/css/admin/table.css')
@vite('resources/css/admin/modal.css')



@section('content')
<div class="option">
    @can('consulting-room.create')
    <a href="{{route('consulting-room.create')}}">Nuevo consultorio</a>
    @endcan
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
            @forelse ($consulting_rooms as $consulting_room)
                <tr>
                    <td>{{$consulting_room->id}}</td>
                    <td>{{$consulting_room->name}}</td>
                    <td>{{$consulting_room->phone}}</td>
                    <td>{{$consulting_room->email}}</td>

                    <td>
                        @can('consulting-room.edit')
                        <a class="success-buttom" href="{{route('consulting-room.edit', $consulting_room)}}">Actualizar</a>
                        @endcan
                        @can('consulting-room.destroy')
                        <a  class="danger-buttom" href="#" onclick="mostrarModal('{{ $consulting_room->id }}')">Eliminar</a>
                        @endcan
                    </td>
                </tr>
                <!-- Modal para confirmar la eliminación -->
                <div id="modal{{ $consulting_room->id }}" class="modal-container">
                    <div class="modal-content">
                        <span class="close" onclick="cerrarModal('{{ $consulting_room->id }}')">&times;</span>
                        <p>¿Estás seguro de que deseas eliminar este consultorio {{$consulting_room->id }} ?</p>
                        <div class="modal-buttons">
                            <form name="formularioeliminar" action="{{ route('consulting-room.destroy', $consulting_room) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>


                            <button class="cancel" onclick="cerrarModal('{{ $consulting_room->id }}')">Cancelar</button>
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="4"><h4>No hay consultorios registrados</h4></td>
                </tr>
            @endforelse
        </tbody>
    </table>

</ul>
<div class="pagination">
    {{ $consulting_rooms->links('pagination::bootstrap-4') }}
</div>
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
</script>
@endsection
