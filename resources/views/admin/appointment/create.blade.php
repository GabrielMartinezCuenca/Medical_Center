@extends('adminlte::page')

@section('title', 'Doctores')
@vite('resources/css/admin/form.css')
@vite('resources/css/admin/modal.css')
@vite('resources/js/calendar.js')
@vite('resources/js/listhour.js')
@vite('resources/css/admin/appointment/calendar.css')


@section('content')
<div id="register">

    <div id="register-content">
        <h1>Nueva Cita</h1>
        <form action="{{route('appointment.store')}}" method="POST">
            @csrf

            <div class="group">
                @include('admin.appointment._partials.calendar')
                @include('admin.appointment._partials.schedule')
            </div>

            <div>
                <label for="">Detalle de la cita:</label>

                <input type="text" name="information" id="information" placeholder="Detalles de la cita" value="{{ old('information') }}">
                @error('information')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
            </div>
            <div class="group">
                <div>
                    <label for="">Buscar</label>
                    <input type="text" id="searchInput" placeholder="Buscar paciente">

                </div>
                <div>
                    <label for="">Familiar:</label>
                    <select name="patient_id" id="patient_id" class="filtered-patients">
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name." ".$patient->lastname }}</option>
                        @endforeach
                    </select>

                    @error('patient_id')
                        <span class="alert-red">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            @can('patient.patientCreateAppointment')

            <div>
                <a href="#" onclick="mostrarModalDelete()">Crear nuevo paciente</a>
            </div>
            @endcan

            <input type="submit" value="Registrar usuario">
        </form>
    </div>


          <!-- Modal para confirmar la cancelacion -->


    </div>

    <div id="modalDelete" class="modal-container">
        <div class="modal-content">
            <span class="close" onclick="cerrarModalDelete()">&times;</span>
            <h2>            Registrar Paciente
            </h2>
            <div class="modal-buttons">
                <form name="formularioRegistrar" method="POST" action="{{ route('patient.patientCreateAppointment') }}">
                    @csrf
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Nombre" value="{{ old('name') }}">
                    @error('name')
                    <label for="" class="alert-red">{{ $message }}</label>
                    @enderror
                    <label for="lastname">Apellido</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Apellido" value="{{ old('lastname') }}">
                    @error('lastname')
                        <label for="" class="alert-red">{{ $message }}</label>
                    @enderror
                    <label for="born_date">Fecha de nacimiento</label>
                    <input type="date" id="born_date" name="born_date" placeholder="Fecha de nacimiento" value="{{ old('born_date') }}">
                    @error('born_date')
                        <label for="" class="alert-red">{{ $message }}</label>
                    @enderror
                    <input type="submit" value="Registrar">
                </form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>


            function mostrarModalDelete() {
                var modal = document.getElementById('modalDelete');
                modal.style.display = 'flex';
            }

            function cerrarModalDelete() {
                var modal = document.getElementById('modalDelete');
                modal.style.display = 'none';
            }

            function eliminarConsultorioDelete() {
                // Agrega aquí la lógica para eliminar el consultorio
                cerrarModal(id);
            }

/*
            function createPatient() {

    // Crear un objeto FormData y agregar los campos
    var formData = new FormData();


    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/patientCreateAppointment', true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if ('mensaje' in response) {
                alert('Funciona XD');
            } else if ('error' in response) {
                alert(response.error);
            } else {
                alert('Error en la respuesta: No se encontraron horarios ni mensaje');
            }
        } else {
            alert('Error en la solicitud');
        }
    };

    // Manejar errores en caso de que la solicitud no sea exitosa
    xhr.onerror = function () {
        alert('Error en la solicitud');
    };

    // Enviar datos en el cuerpo de la solicitud
    xhr.send(formData);
}
*/

$(document).ready(function () {
        var originalOptions = $('#patient_id').html();

        $('#searchInput').on('keyup', function () {
            var searchText = $(this).val().toLowerCase();

            var filteredOptions = originalOptions;
            $('.filtered-patients option').each(function () {
                var patientText = $(this).text().toLowerCase();

                if (!patientText.includes(searchText)) {
                    filteredOptions = filteredOptions.replace($(this).prop('outerHTML'), '');
                }
            });

            $('#patient_id').html(filteredOptions);
        });
    });
        </script>

@endsection
