<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadisticas</title>
    <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script>
        var ctx = document.getElementById('graficaBarras').getContext('2d');
        var usuarios = {!! json_encode($usuarios) !!}; // Asegúrate de que $usuarios contenga datos válidos
        var cierresTotales = {!! json_encode($registros->pluck('cierres_totales')) !!}; // Asegúrate de que $registros contenga datos válidos
        var sumaMontoPropiedades = {!! json_encode($registros->pluck('suma_monto_propiedades')) !!}; // Asegúrate de que $registros contenga datos válidos
    </script>
</head>
<body>
    <header>
        @include('nav')
    </header>
    @if ($permiso == "limited")
    <button type="button" class="btn btn-success" id="btn_agregar" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="{{ asset('images/agregar.png') }}" alt="" id="suma">
    </button>
    @endif

    <script>
        const usuarios = {!! json_encode($usuarios->pluck('nombre', 'id')) !!};
        const cierresTotales = {!! json_encode($registros->pluck('cierres_totales')) !!};
        const sumaMontoPropiedades = {!! json_encode($registros->pluck('suma_monto_propiedades')) !!};

        const totalCierres = cierresTotales.reduce((acc, current) => acc + current, 0);
        const totalMontoPropiedades = sumaMontoPropiedades.reduce((acc, current) => acc + current, 0);

        const porcentajeCierres = cierresTotales.map(valor => (valor / totalCierres) * 100);
        const porcentajeMontoPropiedades = sumaMontoPropiedades.map(valor => (valor / totalMontoPropiedades) * 100);

        const chartData = {
            usuarios: Object.values(usuarios),
            porcentajeCierres: porcentajeCierres,
            porcentajeMontoPropiedades: porcentajeMontoPropiedades
        };

        const myChart = document.getElementById("graficaBarras");

        new Chart(myChart, {
            type: "bar",
            data: {
                labels: chartData.usuarios,
                datasets: [
                    {
                        label: "Porcentaje de Cierres",
                        data: chartData.porcentajeCierres,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: "Porcentaje del Monto de Propiedades",
                        data: chartData.porcentajeMontoPropiedades,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
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
    </script>
</body>
</html>
