<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agentes</title>
    <link rel="stylesheet" href="{{ asset('css/style5.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        @include('nav')
    </header>
    <h2 style="color: white">Agentes</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Nombre Agente</th>
                    <th>Correo</th>
                    <th>Celular</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agentes as $agente)
                    <tr>
                        <td>{{ $agente->nombre }}</td>
                        <td>{{ $agente->correo_institucional }}</td>
                        <td>{{ $agente->celular }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

