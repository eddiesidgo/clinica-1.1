<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consultas</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        header, footer {
            text-align: center;
            margin-bottom: 30px;
        }
        header h1 {
            font-size: 2.5em;
            margin-bottom: 0;
        }
        header img {
            max-height: 70px;
            margin-bottom: 20px;
        }
        h2 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-top: 40px;
        }
        .lead {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .page-break {
            page-break-before: always;
        }
        @media print {
            .no-print {
                display: none;
            }
            .container {
                box-shadow: none;
                border: none;
            }
        }
        table thead {
            background-color: #000;
            color: #fff;
        }
        table {
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <header>
            <h1>Reporte de Consultas</h1>
        </header>
        <section>
            <h2>Detalles de Consultas</h2>
            <p class="lead">A continuación se presenta un resumen de las consultas registradas.</p>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha de la Consulta</th>
                        <th>Diagnóstico</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->idConsulta }}</td>
                        <td>{{ $consulta->event->start_date }}</td>
                        <td>{{ $consulta->diagnostico }}</td>
                        <td>{{ $consulta->estado }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <footer class="text-center mt-5 no-print">
    </script>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    
</body>
</html>
