@extends('adminlte::page')

@section('title', 'Citas')
@vite('resources/css/admin/table.css')
@vite('resources/css/admin/modal.css')

@section('content_header')
<h1>Consultorios Médicos</h1>
@endsection

@section('content')

<ul>
    <table>
        <thead>
            <th>ID</th>
            <th>Consultorio</th>
            <th>Telefono</th>
            <th>Email</th>

            <th>Opciones</th>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->email}}</td>

                    <td>
                        @can('user.edit')
                        <a class="success-buttom" href="{{ route('user.edit', $user) }}">Editar</a>
                        @endcan
                    </td>
                </tr>

                <div id="modal{{ $user->id }}" class="modal-container">
                    <div class="modal-content">
                        <span class="close" onclick="cerrarModal('{{ $user->id }}')">&times;</span>
                        <p>¿Estás seguro de que deseas eliminar este medico?</p>
                        <div class="modal-buttons">
                            <form name="formularioeliminar" action="{{route('user.destroy', $user)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>


                            <button class="cancel" onclick="cerrarModal('{{ $user->id }}')">Cancelar</button>
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
</script>
@endsection
