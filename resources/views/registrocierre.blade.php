@php
use App\Models\FuenteContacto;
$fuentes_contacto = FuenteContacto::all();
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Cierre</title>
    <link rel="stylesheet" href="{{ asset('css/style6.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>


    <header>
        @include('navCierre')
    </header>
    <div class="center">
    <div class="estilo-random">
            <h1 class="texto-grande">Registro de Cierre</h1>
        </div>
        <div class="container-scroll">
    <form method="post" action="{{ route('registrocierre.store') }}" class="mt-4" autocomplete="off">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="cerro" class="form-label">Cerro:</label>
                <select id="cerro" name="cerro" class="form-select" required>
                    <option value="" selected>Elige</option>
                    @foreach($usuarios as $id => $nombre)
                        <option value="{{ $id }}">{{ $nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="ingreso" class="form-label">Ingreso:</label>
                <select id="ingreso" name="ingreso" class="form-select" required>
                    <option value="" selected>Elige</option>
                    @foreach($usuarios as $id => $nombre)
                        <option value="{{ $id }}">{{ $nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Repite esta estructura para otros campos -->

        <div class="row mb-3">
            <div class="col">
                <label for="montoPropiedad" class="form-label">Monto de Propiedad:</label>
                <input type="text" id="montoPropiedad" name="monto_propiedad" class="form-control" required>
            </div>
            <div class="col">
                <label for="recurso" class="form-label">Recurso:</label>
                <select id="recurso" name="recurso" class="form-select" required>
                    <option value="" selected>Elige</option>
                    <option value="FOVISSSTE">FOVISSSTE</option>
                    <option value="INFONAVIT">INFONAVIT</option>
                    <option value="Credito Bancario">Crédito Bancario</option>
                    <option value="Recursos Propios">Recursos Propios</option>
                </select>
            </div>
        </div>

        <!-- Repite esta estructura para otros campos -->

        <div class="row mb-3">
            <div class="col">
                <label for="estadoCivil" class="form-label">Estado Civil:</label>
                <select id="estadoCivil" name="estado_civil" class="form-select" required>
                    <option value="" selected>Elige</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="fuenteContacto" class="form-label">Fuente de Contacto:</label>
                <select id="fuenteContacto" name="fuente_contacto" class="form-select" required>
                    <option value="" selected>Elige</option>
                    @foreach($fuentes_contacto as $fuente_contacto)
                        <option value="{{ $fuente_contacto->id }}">{{ $fuente_contacto->nombre_fuente }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="submit" value="Guardar" class="btn btn-primary mt-3">
            </div>
        </div>
    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
        crossorigin="anonymous"></script>
    <script>
        var miToast = document.getElementById("mi-toast");
        var toast = new bootstrap.Toast(miToast);
        toast.show();
    </script>
</body>

</html>
