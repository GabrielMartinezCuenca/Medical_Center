<div class="dashboard-statistics">
    <h2>Estadisticas del consultorio:</h2>
    <div class="general">
        <div>
            <h3>Solicitudes</h3>
            <p>{{ $requestsCount }}</p>
            <a href="{{ route('appointment.index') }}">Ver todo ></a>
        </div>
        <div><h3>Citas confirmadas </h3><p>{{ $appointmentsCount }}</p><a href="{{ route('appointmentConfirmed') }}">Ver todo ></a></div>
        <div><h3>Pacientes</h3><p> {{ $patients }}</p><a href="{{ route('patient.index') }}">Ver todo ></a></div>
        <div><h3>Doctores</h3> <p>{{ $doctors}}</p><a href="{{ route('doctor.index') }}">Ver todo ></a></div>
    </div>
    <div style="width: 80%; margin: auto;">
        <canvas id="barChart"></canvas>
    </div>

    <div class="general">
        <div><h3>Citas médicas canceladas</h3><p> {{ $appointmentsCanceledCount }}</p><a href="{{ route('appointment.canceled') }}">Ver todo ></a></div>
        <div><h3>Citas médicas terminadas</h3><p> {{ $appointmentsCompletedCount }}</p><a href="{{ route('appointment.history') }}">Ver todo ></a></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('barChart').getContext('2d');

        var appointmentsCanceledCount = {{ $appointmentsCanceledCount }};
        var appointmentsCompletedCount = {{ $appointmentsCompletedCount }};

        var data = {
            labels: ['Citas Canceladas', 'Citas Completadas'],
            datasets: [{
                label: 'Número de Citas',
                data: [appointmentsCanceledCount, appointmentsCompletedCount],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', // Color para Citas Canceladas
                    'rgba(75, 192, 192, 0.2)'  // Color para Citas Completadas
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        };

        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    });
</script>
