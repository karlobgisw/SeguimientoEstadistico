<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <tr>
            <td>Denise Vázquez</td>
            <td>denise.vazquez@remaxvictoria.mx</td>
            <td>6181449104</td>
        </tr>
        <tr>
            <td>Angelica Gomez</td>
            <td>angelica.gomez@remaxvictoria.mx</td>
            <td>6181132264</td>
        </tr>
        <tr>
            <td>Merith Ortiz</td>
            <td>merith.ortiz@remaxvictoria.mx</td>
            <td>6181069203</td>
        </tr>
        <tr>
            <td>Tomas Campos</td>
            <td>tomas.campos@remaxvictoria.mx</td>
            <td>6181594001</td>
        </tr>
        <tbody>
    </table>
</div>
</body>
</html>