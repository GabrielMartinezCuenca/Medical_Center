<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a nuestro servicio de citas médicas</title>
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
            margin-bottom: 10px;
        }
        strong {
            font-weight: bold;
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
            <h1>Bienvenido a nuestro servicio de citas médicas</h1>
        </div>
        <div class="content">
            <p>Estimado <strong>{{$user->name . " " . $user->lastname}}</strong>,</p>
            <p>¡Bienvenido a nuestro servicio de citas médicas! Estamos encantados de tenerte como parte de nuestra comunidad. Con nuestro servicio, puedes programar y administrar tus citas médicas de manera conveniente y eficiente.</p>
            <p>Aquí hay algunas de las características destacadas de nuestro servicio:</p>
            <ul>
                <li>Reserva de citas médicas en línea.</li>
                <!--- <li>Recordatorios de citas por correo electrónico.</li> --->
                <li>Acceso a tu historial médico en línea.</li>
                <li>Facilidad para comunicarte con tus médicos.</li>
            </ul>
            <p>Esperamos que encuentres nuestro servicio útil para tus necesidades de atención médica.</p>
            <p>Si tienes alguna pregunta o necesitas ayuda, no dudes en ponerte en contacto con nuestro equipo de soporte.</p>
            <p>¡Gracias por elegir nuestro servicio de citas médicas!</p>
            <p>Atentamente,</p>
            <p>Tu equipo de <strong>[Nombre de la Compañía]</strong></p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} [Nombre de la Compañía]. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
