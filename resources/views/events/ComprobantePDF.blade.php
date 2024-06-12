<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .cita-container {
            display: flex;
            align-items: center;
            background-color: #fff;
            padding: 15px 25px;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(12, 11, 11, 0.1);
            max-width: 90%;
            border: 1px solid #ddd;
        }
        .cita-item {
            flex: 1;
            padding: 0 10px;
        }
        .cita-title {
            font-weight: bold;
            margin-bottom: 5px;
            color: #030202;
        }
        .cita-content {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="cita-container">
        <center>
            <h3>Comprobante de Consulta</h3>
        </center>
        <div class="cita-item">
            <p class="cita-title">Fecha y Hora:</p>
            <p class="cita-content">{{$event->start_date}}</p>
        </div>
        <div class="cita-item">
            <p class="cita-title">Nombre del Paciente:</p>
            <p class="cita-content">{{$event->nombre}}</p>
            <p class="cita-title">Documento Único de Identidad:</p>
            <p class="cita-content">{{$event->DUI}}</p>
        </div>
        <div class="cita-item">
            <p class="cita-title">Fecha y hora límite</p>
            <p class="cita-content">{{$event->end_date}}</p>
        </div>
        <div class="cita-item">
            <p class="cita-title">Motivo de la Consulta:</p>
            <p class="cita-content">{{$event->event}}</p>
        </div>
        <div class="cita-item">
            <p class="cita-title">Notas Adicionales:</p>
            <p class="cita-content">Ninguna</p>
        </div>
        <center>
        <div class="cita-item">
            <p class="cita-title">AUTORIZADO</p>
            <p class="cita-content">MediSphere</p>
        </div>
    </center>
    </div>
</body>
</html>
