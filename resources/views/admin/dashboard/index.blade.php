@extends('adminlte::page')

@section('title', 'Citas')
@vite('resources/css/admin/table.css')
@vite('resources/css/admin/modal.css')
@vite('resources/css/admin/dashboard/panel.css')


@section('content')

@can('dashboard.statistics')
@include('admin.dashboard._partials.statistics')
@endcan
@can('doctor.dashboard')
@if ($requests != null)
@include('admin.dashboard._partials.statisticsDoctor')

<ul>
    <table>
        <thead>
            <th>Nº</th>
            <th>Paciente</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Médico</th>
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
                        @if ($request->doctor)
                            {{ $request->doctor->name . ' ' . Str::limit($request->doctor->lastname, 5) }}
                        @else
                            N/R
                        @endif
                    </td>


                    <td>
                        @can('appointment.show')
                            <a class="danger-buttom" href="{{ route('appointment.show', $request->id) }}">Ver cita</a>
                        @endcan
                        @can('appointment.prescription')
                            <a class="danger-buttom" href="{{ route('dashboard.prescriptionPanel', $request->id) }}">Atender
                                cita</a>
                        @endcan
                        @can('appointment.cancelAppointment')
                            <a class="danger-buttom" href="#"
                                onclick="mostrarModalDelete('{{ $request->id }}')">Cancelar cita</a>
                        @endcan
                    </td>
                </tr>



                <!-- Modal para confirmar la cancelacion -->
                <div id="modalDelete{{ $request->id }}" class="modal-container">
                    <div class="modal-content">
                        <span class="close" onclick="cerrarModalDelete('{{ $request->id }}')">&times;</span>
                        <p>¿Estás seguro que deseas cancelar esta cita?</p>
                        <div class="modal-buttons">
                            <form name="formularioeliminar"
                                action="{{ route('appointment.cancelAppointment', $request->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit">Cancelar</button>
                            </form>

                            <button class="cancel" onclick="cerrarModalDelete('{{ $request->id }}')">Cancelar</button>
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="6">
                        <h4>No hay citas confirmadas</h4>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>


</ul>
<div class="pagination">
    {{ $requests->links('pagination::bootstrap-4') }}
</div>

@endif
@endcan
<script>
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
