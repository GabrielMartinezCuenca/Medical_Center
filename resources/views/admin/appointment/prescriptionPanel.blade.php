@extends('adminlte::page')

@section('title', 'Doctores')
@vite('resources/css/admin/appointment/prescription.css')
@vite('resources/css/base/app.css')


@section('content')

    <div id="prescription">
        @can('prescription.view')
            <div class="prescription-content">
                <header>
                    <div class="doctor-information">
                        <img class="icon" src="{{ asset('assets/images/logo.png') }}" alt="">
                        <ul>
                            <li>Dr. {{ $appointment->doctor->name . ' ' . $appointment->doctor->lastname }} </li>
                            <li>Especialidad: {{ $appointment->doctor->medical_especiality->especiality }}</li>
                            <li>Cedula: {{ $appointment->doctor->professional_license }}</li>
                            <li>universidad: {{ $appointment->doctor->scholarship }}</li>
                            <li>consultorio: {{ $appointment->doctor->consulting_room->name }}</li>
                            <li>telefono: {{ $appointment->doctor->consulting_room->phone }}</li>
                            <li>Correo electronico: {{ $appointment->doctor->consulting_room->email }}</li>
                        </ul>
                    </div>
                    <span>N° {{ $appointment->id }}</span> <span>Fecha: {{ $appointment->date }}, hora: </span>
                </header>

                <div class="line2"></div>

                <section class="patient">
                    <ul>
                        <li>Paciente: {{ $appointment->patient->name . ' ' . $appointment->patient->lastname }}</li>
                        <li>Edad: {{ $appointment->patient->born_date }}</li>
                        <li>Diagnostico: {{ $appointment->prescription->treatment }}</li>
                        <li>
                            <ul>
                                <li>Altura: {{ $appointment->patient->height }}</li>
                                <li>Peso: {{ $appointment->patient->weight }}</li>
                                <li>IMC: {{ $appointment->patient->IMC }} </li>
                                <li>Temperatura: {{ $appointment->patient->temperature }}</li>
                                <li>Presión arterial: {{ $appointment->patient->blood_pressure }}</li>
                            </ul>
                        </li>

                    </ul>

                </section>
                <div class="line2"></div>

                <section class="treatment">
                    <h2>RX</h2>
                    <p>
                        {{ $appointment->prescription->prescription }}
                    </p>
                </section>
            </div>
        @endcan


    </div>
    <div class="options">
        @can('pdfGenerate')
            <a href="{{ route('pdfGenerate', $appointment) }}">Descargar</a>
        @endcan
        <a href="{{ route('appointmentConfirmed') }}">Continuar</a>
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

        function mostrarModalConfirm(id) {
            var modal = document.getElementById('modalConfirm' + id);
            modal.style.display = 'flex';
        }

        function cerrarModalConfirm(id) {
            var modal = document.getElementById('modalConfirm' + id);
            modal.style.display = 'none';
        }

        function eliminarConsultorioConfirm(id) {
            // Agrega aquí la lógica para eliminar el consultorio
            cerrarModal(id);
        }
    </script>
@endsection
