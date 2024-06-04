<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Receta Médica</title>
    <style>
        body {
          /*Familia que utilizo para toda la estructura*/
            font-family: sans-serif;
        }
        /*Aquí doy color al DIV principal, el que engloba*/
        .bg-white {
            background-color:#F7F9F9;
        }
        /*Redondeo de bordes de descripción de receta*/
        .rounded-lg {
            border-radius: 0.5rem;
        }
        .shadow-md {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .p-6 {
            padding: 1.5rem;
        }
        /*Tamaño de div principal*/
        .max-w-md {
            max-width: 15cm;
        }
         /*DIV proncipal en el centro*/
        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }
        .justify-between {
            justify-content: space-between;
        }
        .items-center {
            align-items: center;
        }
        .mb-4 {
            margin-bottom: 1rem;
        }
        .text-2xl {
            font-size: 1.5rem;
        }
        .font-bold {
            font-weight: 700;
        }
        .text-gray-500 {
            color: #6b7280;
        }
        .text-sm {
            font-size: 0.875rem;
        }
        .grid {
            display: grid;
        }
        .grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
        .gap-4 {
            gap: 1rem;
        }
        .mb-6 {
            margin-bottom: 1.5rem;
        }
        .text-lg {
            font-size: 1.125rem;
        }
        .font-medium {
            font-weight: 500;
        }
        .text-gray-600 {
            color: #4b5563;
        }
        /*Aquí doy color al DIV de datos de receta*/
        .bg-gray-100 {
            background-color: #FDFEFE;
        }
        .grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
        .mt-6 {
            margin-top: 1.5rem;
        }
        .text-gray-500 {
            color: #6b7280;
        }
        .Medic{
          text-align: center
        }
    </style>
</head>
<body>
    <div class="bg-white rounded-lg shadow-md p-6 max-w-md mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Receta Médica</h1>
            <div class="text-gray-500 text-sm">
              <!--Utilizo la libreria Carbon para manejar la fecha de la receta, está plasamará la fecha del día-->
                <p>Fecha: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
                <p>Código: {{ $receta->generateCodigo()}}</p>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <h2 class="text-lg font-medium mb-2">Paciente</h2>
                <div class="text-gray-600">
                  <p>Nombre:{{ $receta->Paciente }}</p>
                  <p>DUI: {{ $receta->DUI }}</p>
                  <p>Correo electrónico: {{ $receta->correo_electronico }}</p>
                </div>
            </div>
        </div>
        <div>
            <h2 class="text-lg font-medium mb-2">Medicamentos Recetados</h2>
            <div class="bg-gray-100 rounded-lg p-4">
                <div class="grid grid-cols-3 gap-4">
                    <div class="Medic">
                        <p class="font-medium">{{ $receta->Receta }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 text-gray-500 text-sm">
            <p>Esta receta es válida por 7 días a partir de la fecha de emisión.</p>
            <p>Firma electrónica de MediSphere:</p>
            <p> {{ $receta->generateFirma()}}</p>
            <div class="Medic">
            <p>APROBADA</p>
          </div>
        </div>
    </div>
</body>
</html>
