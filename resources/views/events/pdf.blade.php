<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Consultas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 40px;
        }
        header, footer {
            text-align: center;
            margin-bottom: 30px;
        }
        header h1 {
            font-size: 2.5em;
            margin-bottom: 0;
            color: #007bff;
        }
        header img {
            max-height: 60px;
            margin-bottom: 20px;
        }
        h2 {
            border-bottom: 2px solid #82b3e8;
            padding-bottom: 10px;
            margin-top: 40px;
            margin-bottom: 20px;
        }
        .lead {
            font-size: 1.1em;
            margin-bottom: 30px;
            color: #555;
        }
        table {
            width: 100%;
            margin: auto;
            border-collapse: collapse;
            font-size: 0.95em;
        }
        table thead th {
            background-color: #82b3e8;
            color: #fff;
            padding: 10px;
            text-align: center;
            border: none;
        }
        table tbody td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tbody tr:hover {
            background-color: #f1f1f1;
        }
        footer {
            margin-top: 50px;
            color: #777;
            font-size: 0.9em;
        }
        @media print {
            .no-print {
                display: none;
            }
            .container {
                box-shadow: none;
                border: none;
                margin: 0;
                padding: 0;
            }
            header h1 {
                font-size: 2em;
            }
            table {
                font-size: 0.85em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <br>
            <h1>Reporte de Consultas</h1>
        </header>
        <section>
            <h2>Detalles de Consultas</h2>
            <p class="lead">A continuación se presenta un resumen de las citas registradas.</p>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Asunto</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Finalización</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citas as $cita)
                    <tr>
                        <td>{{ $cita->nombre }}</td>
                        <td>{{ $cita->event }}</td>
                        <td>{{ $cita->start_date }}</td>
                        <td>{{ $cita->end_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <footer class="text-center no-print">
            <p>&copy; 2024 MediSphere. Todos los derechos reservados.</p>
        </footer>
    </div>
</body>
</html>
