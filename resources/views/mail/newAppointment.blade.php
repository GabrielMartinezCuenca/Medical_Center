<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a nuestro servicio de citas médicas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .header {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .content {
            background-color: #ffffff;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-size: 24px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        ul {
            list-style-type: disc;
            padding-left: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Estimado, {{$appointment -> patient -> user -> name . " " . $appointment -> patient -> user -> lastname}}, tu cita ha sido agendada con exito</h1>
    <div class="content">
       <p>Tu familiar: {{$appointment->patient->name . " " . $appointment -> patient ->lastname}} ha solicitado una cita para el dia {{$appointment -> date}}, a las {{$appointment -> hour}}</p>
       <p>Evaluaremos lo mas rapido posible tu petición. Podrás ver la confirmacion de tu cita tan pronto como nos sea posible en nuestro sitio WEB o a traves de tu correo electronico. Trataremos de contactarte lo mas rapido posible.</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} [Nombre de la Compañía]. Todos los derechos reservados.
    </div>
</body>
</html>
