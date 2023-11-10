<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadisticas Generales</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style7.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>
        @include('nav')
    </header>

    <div class="search">
        <!-- Eliminé el formulario de filtro, ya que queremos mostrar todos los datos -->
    </div>

    <!-- Título grande arriba de la gráfica -->
    <h1 style="text-align: center; font-size: 24px; margin-top: 20px;">Estadísticas Generales de Cierres</h1>

    <div class="estadisticas">
        <!-- Gráfica de barras para mostrar estadísticas -->
        <div class="chart-container" style="width: 70%; margin: auto;">
            <canvas class="my-chart" id="grafica"></canvas>
        </div>

        <!-- Tabla simple con datos -->
        <table class="table" style="width: 30%; margin: auto; margin-top: 20px;">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Cierres Totales</th>
                    <th>Total Monto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stats as $stat)
                <tr>
                    <td>{{ $stat->nombre }}</td>
                    <td>{{ $stat->cierres_count }}</td>
                    <td>{{ $stat->total_monto }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h1 style="text-align: center; font-size: 24px; margin-top: 20px;">Estadísticas Generales de Ingresos</h1>
    <!-- Gráfica de pastel para "Ingreso" -->
    <div class="estadisticas">
        <div class="chart-container" style="width: 70%; margin: auto;">
            <canvas class="my-chart" id="graficaIngreso"></canvas>
        </div>
    </div>
    <h1 style="text-align: center; font-size: 24px; margin-top: 20px;">Estadísticas Generales de Recursos</h1>
    <!-- Gráfica de pastel para "Recurso" -->
    <div class="estadisticas">
        <div class="chart-container" style="width: 70%; margin: auto;">
            <canvas class="my-chart" id="graficaRecurso"></canvas>
        </div>
    </div>
    <h1 style="text-align: center; font-size: 24px; margin-top: 20px;">Estadísticas Generales de Fuentes de Contactos</h1>
    <!-- Gráfica de pastel para "Fuente de Contacto" -->
    <div class="estadisticas">
        <div class="chart-container" style="width: 70%; margin: auto;">
            <canvas class="my-chart" id="graficaFuenteContacto"></canvas>
        </div>
    </div>
    <h1 style="text-align: center; font-size: 24px; margin-top: 20px;">Estadísticas Generales de Genero</h1>
    <!-- Gráfica de pastel para "Genero" -->
    <div class="estadisticas">
        <div class="chart-container" style="width: 70%; margin: auto;">
            <canvas class="my-chart" id="graficaGenero"></canvas>
        </div>
    </div>
    <h1 style="text-align: center; font-size: 24px; margin-top: 20px;">Estadísticas Generales de Rango de Edad</h1>
    <!-- Gráfica de pastel para "Rango de Edad" -->
    <div class="estadisticas">
        <div class="chart-container" style="width: 70%; margin: auto;">
            <canvas class="my-chart" id="graficaRangoEdad"></canvas>
        </div>
    </div>
    <h1 style="text-align: center; font-size: 24px; margin-top: 20px;">Estadísticas Generales de Estado Civil</h1>
    <!-- Gráfica de pastel para "Estado Civil" -->
    <div class="estadisticas">
        <div class="chart-container" style="width: 70%; margin: auto;">
            <canvas class="my-chart" id="graficaEstadoCivil"></canvas>
        </div>
    </div>

    <script>
        // Obtén los datos para la gráfica de barras desde el backend
        var statsData = <?php echo json_encode($stats); ?>;

        // Preparar los datos para la gráfica de barras
        var labels = statsData.map(function (stat) {
            return stat.cerro;
        });

        var cierresCount = statsData.map(function (stat) {
            return stat.cierres_count;
        });

        var totalMonto = statsData.map(function (stat) {
            return stat.total_monto;
        });

        // Crear la gráfica de barras
        var ctx = document.getElementById('grafica').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Cierres Totales',
                        data: cierresCount,
                        backgroundColor: '#3498db', // Cambié el color a azul
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Monto',
                        data: totalMonto,
                        backgroundColor: '#e74c3c', // Cambié el color a rojo
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Obtén los datos para la gráfica de pastel de "Ingreso" desde el backend
        var ingresoData = <?php echo json_encode($ingresoStats); ?>;
        createDoughnutChart('graficaIngreso', ingresoData);

        // Obtén los datos para la gráfica de pastel de "Recurso" desde el backend
        var recursoData = <?php echo json_encode($recursoStats); ?>;
        createDoughnutChart('graficaRecurso', recursoData);

        // Obtén los datos para la gráfica de pastel de "Fuente de Contacto" desde el backend
        var fuenteContactoData = <?php echo json_encode($fuenteContactoStats); ?>;
        createDoughnutChart('graficaFuenteContacto', fuenteContactoData);

        // Obtén los datos para la gráfica de pastel de "Genero" desde el backend
        var generoData = <?php echo json_encode($generoStats); ?>;
        createDoughnutChart('graficaGenero', generoData);

        // Obtén los datos para la gráfica de pastel de "Rango de Edad" desde el backend
        var rangoEdadData = <?php echo json_encode($rangoEdadStats); ?>;
        createDoughnutChart('graficaRangoEdad', rangoEdadData);

        // Obtén los datos para la gráfica de pastel de "Estado Civil" desde el backend
        var estadoCivilData = <?php echo json_encode($estadoCivilStats); ?>;
        createDoughnutChart('graficaEstadoCivil', estadoCivilData);

        // Función para generar gráficas de pastel
        function createDoughnutChart(canvasId, data) {
            var ctx = document.getElementById(canvasId).getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.map(stat => stat.column),
                    datasets: [{
                        data: data.map(stat => stat.count),
                        backgroundColor: '#f39c12', // Cambié el color a amarillo
                    }]
                }
            });
        }
    </script>

    <!-- ... (código posterior) ... -->
</body>

</html>
