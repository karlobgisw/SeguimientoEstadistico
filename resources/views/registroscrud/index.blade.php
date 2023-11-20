<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registros de Cierre</title>
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style="background-color: #3498db; color: #fff;">
    <header>
        @include('nav')
    </header>
    <div class="container mt-4">
        <h1>Registros de Cierre</h1>

        <!-- Agrega el botón para ir a Estadísticas -->
        <div class="search">
            <form action="{{ route('estadisticas.index') }}" method="get" class="buscador" id="miFormulario">
                @csrf
                <button type="submit" class="btn btn-primary">Ir a Estadísticas</button>
            </form>
        </div>

        <table class="table table-bordered table-striped mt-4" style="background-color: #ffffff; color: #000;">
            <thead>
                <tr style="background-color: #2980b9;">
                    <th>ID</th>
                    <th>Cerró (Usuario)</th>
                    <th>Ingreso (Usuario)</th>
                    <th>Monto Propiedad</th>
                    <th>Recurso</th>
                    <th>Fuente de Contacto</th>
                    <th>Género</th>
                    <th>Rango de Edad</th>
                    <th>Estado Civil</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->userCerro->nombre }}</td>
                        <td>{{ $registro->userIngreso->nombre }}</td>
                        <td>{{ $registro->monto_propiedad }}</td>
                        <td>{{ $registro->recurso }}</td>
                        <td>{{ $registro->fuenteContacto->nombre_fuente }}</td>
                        <td>{{ $registro->genero }}</td>
                        <td>{{ $registro->rango_edad }}</td>
                        <td>{{ $registro->estado_civil }}</td>
                        <td>{{ $registro->created_at }}</td>

                        <!-- Botón para abrir el modal -->
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal{{ $registro->id }}">
                                Editar
                            </button>
                        </td>
                    </tr>

                    <!-- Modal para editar -->
                    <div class="modal fade" id="editarModal{{ $registro->id }}" tabindex="-1" aria-labelledby="editarModalLabel{{ $registro->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel{{ $registro->id }}">Editar Registro</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Contenido del modal -->
                <form action="{{ route('registroscrud.update', $registro->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col">
                            <label for="cerradoModal" class="form-label">Cerró (Usuario):</label>
                            <select id="cerradoModal" name="cerroModal" class="form-select" required>
                                <option value="" selected>Elige</option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" {{ $usuario->id == $registro->cerro ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="ingresoModal" class="form-label">Ingreso (Usuario):</label>
                            <select id="ingresoModal" name="ingresoModal" class="form-select" required>
                                <option value="" selected>Elige</option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" {{ $usuario->id == $registro->ingreso ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="montoPropiedadModal" class="form-label">Monto de Propiedad:</label>
                            <input type="text" id="montoPropiedadModal" name="montoPropiedadModal" class="form-control" value="{{ $registro->monto_propiedad }}" required>
                        </div>
                        <div class="col">
                            <label for="recursoModal" class="form-label">Recurso:</label>
                            <select id="recursoModal" name="recursoModal" class="form-select" required>
                                <option value="" selected>Elige</option>
                                <option value="FOVISSSTE" {{ $registro->recurso == 'FOVISSSTE' ? 'selected' : '' }}>FOVISSSTE</option>
                                <option value="INFONAVIT" {{ $registro->recurso == 'INFONAVIT' ? 'selected' : '' }}>INFONAVIT</option>
                                <option value="Credito Bancario" {{ $registro->recurso == 'Credito Bancario' ? 'selected' : '' }}>Crédito Bancario</option>
                                <option value="Recursos Propios" {{ $registro->recurso == 'Recursos Propios' ? 'selected' : '' }}>Recursos Propios</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="estadoCivil" class="form-label">Estado Civil:</label>
                            <select id="estadoCivil" name="estado_civil" class="form-select" required>
                                <option value="" selected>Elige</option>
                                <option value="Soltero" {{ $registro->estado_civil == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                                <option value="Casado" {{ $registro->estado_civil == 'Casado' ? 'selected' : '' }}>Casado</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="fuenteContacto" class="form-label">Fuente de Contacto:</label>
                            <select id="fuenteContacto" name="fuente_contacto" class="form-select" required>
                                <option value="" selected>Elige</option>
                                @foreach($fuentes_contacto as $fuente_contacto)
                                    <option value="{{ $fuente_contacto->id }}" {{ $fuente_contacto->id == $registro->fuente_contacto ? 'selected' : '' }}>{{ $fuente_contacto->nombre_fuente }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="genero" class="form-label">Género:</label>
                            <select id="genero" name="genero" class="form-select" required>
                                <option value="" selected>Elige</option>
                                <option value="Hombre" {{ $registro->genero == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                                <option value="Mujer" {{ $registro->genero == 'Mujer' ? 'selected' : '' }}>Mujer</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="rangoEdad" class="form-label">Rango de Edad:</label>
                            <select id="rangoEdad" name="rango_edad" class="form-select" required>
                                <option value="" selected>Elige</option>
                                <option value="20-30" {{ $registro->rango_edad == '20-30' ? 'selected' : '' }}>20-30</option>
                                <option value="30-40" {{ $registro->rango_edad == '30-40' ? 'selected' : '' }}>30-40</option>
                                <option value="40-50" {{ $registro->rango_edad == '40-50' ? 'selected' : '' }}>40-50</option>
                                <option value="50-60" {{ $registro->rango_edad == '50-60' ? 'selected' : '' }}>50-60</option>
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
            <div class="modal-footer">
                <form action="{{ route('registroscrud.destroy', $registro->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
    <script src="{{ asset('js/app5.js') }}"></script>
</body>

</html>
