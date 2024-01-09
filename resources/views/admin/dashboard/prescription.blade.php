@extends('adminlte::page')

@section('title', 'Doctores')
@vite('resources/css/admin/appointment/document.css')
@vite('resources/js/calendar.js')
@vite('resources/js/listhour.js')
@vite('resources/css/admin/appointment/calendar.css')
@vite('resources/css/admin/modalForm.css')


@section('content')
    <div id="document">

        <div id="document-content">
            <div class="title-appointment">
                @if ($appointment->status >= 2)
                    <h4>Cita Nº {{ $appointment->id }}</h4>
                @else
                    <h4>Solicitud Nº {{ $appointment->id }}</h4>
                @endif

            </div>

            <div class="information-patient">

                <h2>Información del paciente</h2>
                <div class="item">
                    <h4>Paciente:</h4> <span>&nbsp; {{ $appointment->patient->name }}
                        {{ $appointment->patient->lastname }}</span>
                </div>
                <div class="item">
                    <h4>Fecha de nacimiento:</h4> <span>&nbsp; {{ $appointment->patient->born_date }} </span>
                </div>

                @if ($appointment->patient->weight != null)
                    <div class="item">
                        <h4>Peso:</h4>
                        <span>&nbsp; {{ $appointment->patient->weight }} </span>
                    </div>
                @else
                    <div class="item">
                        <h4>Peso:</h4>
                        &nbsp; <span>No Registrado</span>
                    </div>
                @endif

                @if ($appointment->patient->height != null)
                    <div class="item">
                        <h4>Peso:</h4>
                        <span>&nbsp; {{ $appointment->patient->height }} </span>
                    </div>
                @else
                    <div class="item">
                        <h4>Altura:</h4>
                        &nbsp; <span>No Registrado</span>
                    </div>
                @endif

                @if ($appointment->patient->IMC != null)
                    <div class="item">
                        <h4>IMC:</h4>
                        <span>&nbsp; {{ $appointment->patient->IMC }} </span>
                    </div>
                @else
                    <div class="item">
                        <h4>IMC:</h4>
                        &nbsp; <span>No Registrado</span>
                    </div>
                @endif

                @if ($appointment->patient->temperature != null)
                    <div class="item">
                        <h4>Temperatura:</h4>
                        <span>&nbsp; {{ $appointment->patient->temperature }} </span>
                    </div>
                @else
                    <div class="item">
                        <h4>IMC:</h4>
                        &nbsp; <span>No Registrado</span>
                    </div>
                @endif

                @if ($appointment->patient->blood_pressure != null)
                    <div class="item">
                        <h4>Presión Arterial:</h4>
                        <span>&nbsp; {{ $appointment->patient->blood_pressure }} </span>
                    </div>
                @else
                    <div class="item">
                        <h4>Presión Arterial:</h4>
                        &nbsp; <span>No Registrado</span>
                    </div>
                @endif

                @if ($appointment->patient && $appointment->patient->user && $appointment->patient->user->email != null)
                    <div class="item">
                        <h4>Correo Electronico:</h4>
                        <span>&nbsp; {{ $appointment->patient->user->email }} </span>
                    </div>
                @else
                    <div class="item">
                        <h4>Correo Electronico:</h4>
                        &nbsp; <span>No disponible</span>
                    </div>
                @endif

                @if ($appointment->patient && $appointment->patient->user && $appointment->patient->user->phone != null)
                    <div class="item">
                        <h4>Telefono:</h4>
                        &nbsp;
                        <span>{{ $appointment->patient->user->phone }}</span>
                    </div>
                @else
                    <div class="item">
                        <h4>Telefono:</h4>
                        &nbsp; <span>No disponible </span>
                    </div>
                @endif




               @can('patient.changeInformationP')
               <div class="option">
                <a href="#" onclick="mostrarModal({{ $appointment->id }})">Modificar Información</a>
            </div>
               @endcan

            </div>

            <form name="prescriptionCreate" action="{{ route('dashboard.prescriptionStore', $appointment->id) }}" method="POST">
                @csrf
                <h2>Diagnostico</h2>

                <textarea name="treatment" id="editor" class="editor">
                </textarea>
                @error('treatment')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
                <h2>Receta Médica</h2>
                <textarea name="prescription" id="editor2" class="editor">
                </textarea>
                @error('prescription')
                    <span class="alert-red">{{ $message }}</span>
                @enderror
                @can('prescription.store')
                    <div class="status">
                        <input type="submit" value="Enviar información">
                    </div>
                @endcan
            </form>


            <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .catch(error => {
                        console.error(error);
                    });
                ClassicEditor
                    .create(document.querySelector('#editor2'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>

        </div>
    </div>

    <div id="modal{{ $appointment->id }}" class="modal-container">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal('{{ $appointment->id }}')">&times;</span>
            <p>Información del paciente</p>
            <div class="modal-buttons">
                <form name="formularioeliminar" method="POST"
                    action="{{ route('patient.changeInformationP', $appointment->id) }}">
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="group">
                        <div>
                            <label for="">Nombre</label>
                            <input type="text" name="name" placeholder="Nombre"
                                value="{{ $appointment->patient->name }}">
                            @error('name')
                                <label for="" class="alert-red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div>
                            <label for="">Apellido</label>
                            <input type="text" name="lastname" placeholder="Apellido"
                                value="{{ $appointment->patient->lastname }}">
                            @error('lastname')
                                <label for="" class="alert-red">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="group">
                        <div>
                            <label for="">Fecha de nacimiento</label>
                            <input type="date" name="born_date" placeholder="Fecha de nacimiento"
                                value="{{ $appointment->patient->born_date }}">
                            @error('born_date')
                                <label for="" class="alert-red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div>
                            <label for="">Peso</label>
                            <input type="text" name="weight" placeholder="Peso (Kilogramos)"
                                value="{{ $appointment->patient->weight }}">
                            @error('weight')
                                <label for="" class="alert-red">{{ $message }}</label>
                            @enderror
                        </div>

                    </div>
                    <div class="group">
                        <div>
                            <label for="">Estatura</label>
                            <input type="text" name="height" placeholder="Estatura (Metros)"
                                value="{{ $appointment->patient->height }}">
                            @error('height')
                                <label for="" class="alert-red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div>
                            <label for="">Temperatura</label>
                            <input type="text" name="temperature" placeholder="Temperatura (Grados Celcius)"
                                value="{{ $appointment->patient->temperature }}">
                            @error('temperature')
                                <label for="" class="alert-red">{{ $message }}</label>
                            @enderror
                        </div>

                    </div>


                    <label for="">Presión arterial</label>
                    <input type="text" name="blood_pressure" placeholder="Presión arterial (mm/HG)"
                        value="{{ $appointment->patient->blood_pressure }}">
                    @error('blood_pressure')
                        <label for="" class="alert-red">{{ $message }}</label>
                    @enderror
                    <input type="submit" value="Enviar información">
                </form>


            </div>
        </div>
    </div>


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
