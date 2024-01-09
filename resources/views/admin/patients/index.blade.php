@extends('adminlte::page')

@section('title', 'Citas')
@vite('resources/css/admin/table.css')
@vite('resources/css/admin/modal.css')

@section('content')
    <div class="option">
        @can('patient.create')
            <a href="{{ route('patient.create') }}">Nuevo paciente</a>
        @endcan
    </div>
    <ul>
        <table>
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>

                <th>Opciones</th>
            </thead>
            <tbody>
                @forelse ($patients as $patient)
                    <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->lastname }}</td>
                        @php
                            $bornDate = \Carbon\Carbon::parse($patient->born_date);
                            $age = $bornDate->age;
                        @endphp
                        <td>{{ $age . ' años' }}</td>


                        <td>
                            @can('patient.edit')
                                <a class="success-buttom" href="{{ route('patient.edit', $patient) }}">Actualizar</a>
                            @endcan
                            @can('patient.destroy')
                                <a class="danger-buttom" href="#" onclick="mostrarModal({{ $patient->id }})">Eliminar</a>
                            @endcan
                        </td>
                    </tr>

                    <!-- Modal para confirmar la eliminación -->
                    <div id="modal{{ $patient->id }}" class="modal-container">
                        <div class="modal-content">
                            <span class="close" onclick="cerrarModal('{{ $patient->id }}')">&times;</span>
                            <p>¿Estás seguro de que deseas eliminar este paciente?</p>
                            <div class="modal-buttons">
                                <form name="formularioeliminar" action="{{ route('patient.destroy', $patient) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>


                                <button class="cancel" onclick="cerrarModal('{{ $patient->id }}')">Cancelar</button>
                            </div>
                        </div>
                    </div>

                @empty
                    <tr>
                        <td colspan="4">
                            <h4>No hay pacientes registrados</h4>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">
            {{ $patients->links() }}
        </div>
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
    </script>
@endsection
