@extends('adminlte::page')

@section('title', 'Citas')
@vite('resources/css/admin/table.css')
@vite('resources/css/admin/modal.css')




@section('content')
    <div class="option">
        @can('especiality.create')
        <a href="{{ route('especiality.create') }}">Nueva especialidad</a>
        @endcan
    </div>
    <ul>
        <table>
            <thead>
                <th>Nº</th>
                <th>Especialidad</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @forelse ($especialities as $especiality)
                    <tr>
                        <td>{{ $especiality->id }}</td>
                        <td>{{ $especiality->especiality }}</td>
                        <td>{{ Str::limit($especiality->description, 20, '...') }}</td>
                        <td>
                            @can('especiality.edit')
                            <a class="success-buttom" href="{{ route('especiality.edit', $especiality->id) }}">Actualizar</a>
                            @endcan
                            @can('especiality.destroy')
                            <a class="danger-buttom" href="#" onclick="mostrarModal('{{ $especiality->id }}')">Eliminar</a>
                            @endcan
                        </td>
                    </tr>

                    <!-- Modal para confirmar la eliminación -->
                    <div id="modal{{ $especiality->id }}" class="modal-container">
                        <div class="modal-content">
                            <span class="close" onclick="cerrarModal('{{ $especiality->id }}')">&times;</span>
                            <p>¿Estás seguro de que deseas eliminar este consultorio {{$especiality->id }} ?</p>
                            <div class="modal-buttons">
                                <form name="formularioeliminar" action="{{ route('especiality.destroy', $especiality) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>

                                <button class="cancel" onclick="cerrarModal('{{ $especiality->id }}')">Cancelar</button>
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
    <div class="pagination">
        {{ $especialities->links('pagination::bootstrap-4') }}
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
