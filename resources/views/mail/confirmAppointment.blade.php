<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Cita Médica</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .header {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 5px 5px 0 0;
        }
        .content {
            margin-bottom: 20px;
        }
        h1 {
            font-size: 24px;
            margin: 0;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }
        ul {
            list-style-type: disc;
            padding-left: 20px;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Confirmación de Cita Médica</h1>
        </div>
        <div class="content">
            <p>Estimado(a) {{$appointment->patient->user->name . " " . $appointment->patient->user->lastname}},</p>
            <p>Tu familiar {{$appointment->patient->name . " " . $appointment->patient->lastname}} ha solicitado una cita para el día {{$appointment->date}} a las {{$appointment->hour}}.</p>
            <p>Nos complace confirmarte que la cita ha sido validada con éxito.</p>
            <p>Adjuntamos un documento para que puedas imprimirlo y llevarlo el día de la cita.</p>
            <ul>
                <li><a href="#">Documento de Confirmación de Cita</a></li>
            </ul>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} [Nombre de la Compañía]. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
