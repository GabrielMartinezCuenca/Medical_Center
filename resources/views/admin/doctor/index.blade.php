@extends('adminlte::page')

@section('title', 'Citas')
@vite('resources/css/admin/table.css')
@vite('resources/css/admin/modal.css')


@section('content')
<div class="option">
    @can('doctor.create')
    <a href="{{route('doctor.create')}}">Nuevo Médico</a>
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
            @forelse ($doctors as $doctor)
                <tr>
                    <td>{{$doctor->id}}</td>
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->phone}}</td>
                    <td>{{$doctor->email}}</td>

                    <td>                        <a class="success-buttom" href="{{route('doctor.edit', $doctor)}}">Actualizar</a>

                        @can('doctor.edit')
                        <a class="success-buttom" href="{{route('doctor.edit', $doctor)}}">Actualizar</a>
                        @endcan
                        @can('doctor.destroy')
                        <a  class="danger-buttom" href="#" onclick="mostrarModal('{{ $doctor->id }}')">Eliminar</a>
                        @endcan
                    </td>
                </tr>
                <!-- Modal para confirmar la eliminación -->
                <div id="modal{{ $doctor->id }}" class="modal-container">
                    <div class="modal-content">
                        <span class="close" onclick="cerrarModal('{{ $doctor->id }}')">&times;</span>
                        <p>¿Estás seguro de que deseas eliminar este medico?</p>
                        <div class="modal-buttons">
                            <form name="formularioeliminar" action="{{route('doctor.destroy', $doctor)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>


                            <button class="cancel" onclick="cerrarModal('{{ $doctor->id }}')">Cancelar</button>
                        </div>
                    </div>
                </div>
            @empty
            <tr>
                <td colspan="5"><h4>No hay especialidades registradas</h4></td>
            </tr>
            @endforelse
        </tbody>
    </table>

</ul>
<div class="pagination">
    {{ $doctors->links('pagination::bootstrap-4') }}
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
