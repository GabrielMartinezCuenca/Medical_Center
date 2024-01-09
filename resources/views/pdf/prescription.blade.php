<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <style>
        .icon{
            width: 50px;
            height: 50px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            background-color: #f0f0f0;
        }

        .doctor-information ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .doctor-information ul li {
            font-size: 12px;
            margin-bottom: 5px;
        }

        .line {
            width: 100%;
            height: 1px;
            background-color: #ccc;
            margin: 20px 0;
        }

        .patient ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .patient ul li {
            font-size: 12px;
            margin-bottom: 5px;
        }

        .treatment {
            padding: 10px;
            border: 1px solid #ccc;
            margin-top: 20px;
        }

        .treatment h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .options {
            display: flex;
            justify-content: flex-end;
            padding: 10px;
            background-color: #f0f0f0;
        }

        .options a {
            background-color: darkblue;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin-left: 10px;
            text-decoration: none;
        }

        .options a:hover {
            background-color: rgb(18, 18, 170);
        }
    </style>
</head>

<body>
    <header>
        <div class="doctor-information">
            <img class="icon" src="{{ public_path().'/assets/images/logo.png' }}" alt="">
            <ul>
                <li>Dr. {{ $appointment->doctor->name . " ". $appointment->doctor->lastname }} </li>
                <li>Especialidad: {{ $appointment->doctor->medical_especiality->especiality}}</li>
                <li>Cedula: {{ $appointment->doctor->professional_license }}</li>
                <li>universidad: {{ $appointment->doctor->scholarship }}</li>
                <li>consultorio: {{ $appointment->doctor->consulting_room->name }}</li>
                <li>telefono: {{ $appointment->doctor->consulting_room->phone }}</li>
                <li>Correo electronico: {{ $appointment->doctor->consulting_room->email }}</li>
            </ul>
        </div>
        <span>N° {{ $appointment->id }}</span> <span>Fecha: {{ $appointment->date }}, hora: {{ $appointment->hour }}</span>
    </header>

    <div class="line"></div>

    <section class="patient">
        <ul>
            <li>Paciente: {{ $appointment->patient->name . " ".$appointment->patient->lastname }}</li>
            <li>Edad: {{ $appointment->patient->born_date }}</li>
            <li>Diagnóstico: {{ $appointment->prescription->treatment }}</li>
            <li>
                <ul>
                    <li>Talla: {{ $appointment->patient->height }}</li>
                    <li>Peso: {{ $appointment->patient->weight }}</li>
                    <li>IMC: {{ $appointment->patient->IMC }}</li>
                    <li>Temperatura: {{ $appointment->patient->temperature }}</li>
                    <li>Presión arterial:{{ $appointment->patient->blood_pressure }}</li>
                </ul>
            </li>
        </ul>
    </section>

    <div class="line"></div>

    <section class="treatment">
        <h2>RX</h2>
        <p>
            {{ $appointment->prescription->prescription }}
        </p>
    </section>

</body>
</html>
