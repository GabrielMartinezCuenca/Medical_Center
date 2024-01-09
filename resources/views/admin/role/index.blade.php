@extends('adminlte::page')

@section('title', 'Citas')
@vite('resources/css/admin/table.css')
@vite('resources/css/admin/modal.css')


@section('content')
    <div class="option">
        @can('role.create')
            <a href="{{ route('role.create') }}">Nuevo Rol</a>
        @endcan
    </div>
    <ul>
        <table>
            <thead>
                <th>Nº</th>
                <th>Rol</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>

                        <td>
                            @can('role.edit')
                                <a class="success-buttom" href="{{ route('role.edit', $role) }}">Actualizar</a>
                            @endcan
                            @can('role.destroy')
                                <a class="danger-buttom" href="#" onclick="mostrarModal('{{ $role->id }}')">Eliminar</a>
                            @endcan
                        </td>
                    </tr>
                    <!-- Modal para confirmar la eliminación -->
                    <div id="modal{{ $role->id }}" class="modal-container">
                        <div class="modal-content">
                            <span class="close" onclick="cerrarModal('{{ $role->id }}')">&times;</span>
                            <p>¿Estás seguro de que deseas eliminar este rol?</p>
                            <div class="modal-buttons">
                                <form name="formularioeliminar" action="{{ route('role.destroy', $role) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>


                                <button class="cancel" onclick="cerrarModal('{{ $role->id }}')">Cancelar</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="5">
                            <h4>No hay especialidades registradas</h4>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </ul>
    <div class="pagination">
        {{ $roles->links('pagination::bootstrap-4') }}
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
