@extends('adminlte::page')

@section('title', 'Citas')
@vite('resources/css/admin/table.css')
@vite('resources/css/admin/modalForm.css')
@vite('resources/css/admin/pagination.css')

@section('content')
    @can('appointment.create')
        <div class="option">
            <a href="{{ route('appointment.create') }}">Nueva Solicitud</a>
        </div>
    @endcan
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
                        <td>{{ Str::limit($request->patient->name . ' ' . $request->patient->lastname, 25) }}</td>
                        <td>{{ $request->date }}</td>
                        <td>{{ $request->hour }}</td>

                        <td>
                            @can('appointment.show')
                                <a class="danger-buttom" href="{{ route('appointment.show', $request->id) }}">Ver solicitud</a>
                            @endcan
                            @can('appointment.statusChange')
                                <a class="success-buttom" href="#" onclick="mostrarModal('{{ $request->id }}')">Confirmar
                                    Cita</a>
                            @endcan
                            @can('appointment.destroy')
                                <a class="danger-buttom" href="#"
                                    onclick="mostrarModalDelete('{{ $request->id }}')">Cancelar Solicitud</a>
                            @endcan
                        </td>
                    </tr>

                    <!-- Modal para confirmar el cambio de estatus -->
                    <div id="modal{{ $request->id }}" class="modal-container">
                        <div class="modal-content">
                            <span class="close" onclick="cerrarModal('{{ $request->id }}')">&times;</span>
                            <p>¿Estás seguro que deseas confirmar esta cita?</p>
                            <div class="modal-buttons">
                                <form name="formularioeliminar"
                                    action="{{ route('appointment.statusChange', $request->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <div>
                                            <label class="item" for="">Médico:</label>
                                            <select name="doctor_id" id="doctor">
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}"
                                                        {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                                        {{ $doctor->name . ' ' . $doctor->lastname . ' (' . $doctor->medical_especiality->especiality . ')' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('doctor_id')
                                                <span class="alert-red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="submit" value="Confirmar Cita">
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- Modal para confirmar la eliminacion -->
                    <div id="modalDelete{{ $request->id }}" class="modal-container">
                        <div class="modal-content">
                            <span class="close" onclick="cerrarModalDelete('{{ $request->id }}')">&times;</span>
                            <p>¿Estás seguro que deseas eliminar esta solicitud?</p>
                            <div class="modal-buttons">
                                <form name="formularioeliminar" action="{{ route('appointment.destroy', $request) }}"
                                    method="POST">
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
                        <td colspan="5">
                            <h4>No hay solicitudes registradas</h4>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </ul>
    <div class="pagination">
        {{ $requests->links('pagination::bootstrap-4') }}
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
