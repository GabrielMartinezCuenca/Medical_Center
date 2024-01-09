<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activación de Cuenta Médica</title>
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
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 3px;
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
            <h1>Activación de Cuenta Médica</h1>
        </div>
        <div class="content">
            <p>Estimado(a) Dr. {{$doctor->name . " " . $doctor->lastname}},</p>
            <p>Tu cuenta médica ha sido dada de alta con éxito.</p>
            <p>Presiona el siguiente botón para generar tu contraseña:</p>
            <a href="{{ route('user.generatePassword', $token) }}">Generar Contraseña</a>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} [Nombre de la Compañía]. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
