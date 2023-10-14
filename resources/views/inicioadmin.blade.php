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
    <button type="button" class="btn btn-success" id="btn_agregar" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="{{ asset('images\agregar.png') }}" alt="" id="suma">
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" id="modal">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('') }}" method="POST">
                @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombre_archivo_foto" class="form-label">Foto de perfil:</label>
                            <input type="file" name="nombre_archivo_foto" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="correo_institucional" class="form-label">Correo Institucional:</label>
                            <input type="email" name="correo_institucional" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="celular" class="form-label">Celular:</label>
                            <input type="text" name="celular" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="sir" class="form-label">Sir:</label>
                            <input type="text" name="sir" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="text" name="password" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="permisos_id" class="form-label">Permisos:</label>
                            <select id="permisos_id" name="permisos_id" class="form-select" nullable>
                                <option text="opcion1">---</option>
                                <option text="2">Agente</option>
                                <option text="1">Staff</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="activo" class="form-label">Activo:</label>  
                            <select id="activo" name="activo" class="form-select" nullable>
                                <option value="opcion1">---</option>
                                <option text="1">Activo</option>
                                <option text="0">Suspendido</option>
                            </select>
                        </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
          </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" id="modal">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('') }}" method="POST">
                @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombre_archivo_foto" class="form-label">Foto de perfil:</label>
                            <input type="file" name="nombre_archivo_foto" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="correo_institucional" class="form-label">Correo Institucional:</label>
                            <input type="email" name="correo_institucional" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="celular" class="form-label">Celular:</label>
                            <input type="text" name="celular" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="sir" class="form-label">Sir:</label>
                            <input type="text" name="sir" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="text" name="password" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="permisos_id" class="form-label">Permisos:</label>
                            <select id="permisos_id" name="permisos_id" class="form-select" nullable>
                                <option text="opcion1">---</option>
                                <option text="2">Agente</option>
                                <option text="1">Staff</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="activo" class="form-label">Activo:</label>  
                            <select id="activo" name="activo" class="form-select" nullable>
                                <option value="opcion1">---</option>
                                <option text="1">Activo</option>
                                <option text="0">Suspendido</option>
                            </select>
                        </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    <div class="contenedor">
        <div class="cabecera">
            <h1></h1>
            <div class="input-group flex-nowrap" id="input">
                <span class="input-group-text" id="addon-wrapping">
                    <svg id="search" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </span>
                <input type="text" class="form-control" placeholder="Buscar agente" aria-label="Username" aria-describedby="addon-wrapping" id="inputt">
            </div>
        </div>
        <div class="cuerpo">
            <div class="titulos">
                <h4>AGENTES</h4>
                <h4 class="acciones">ACCIONES</h4>
            </div>
            @foreach ($agentes as $agente)
            <div class="tabla">
                <div class="datos">
                    <div class="imagen"></div>
                    <div class="info">
                        <h6>{{$agente->nombre}}</h6>
                        <div class="logos">
                            <svg id="logo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                            </svg>
                            <p class="agenteinfo">{{$agente->correo_institucional}}</p>
                        </div>
                        <div class="logos">
                            <svg id="logo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            <p class="agenteinfo">{{$agente->celular}}</p>
                        </div>
                        <div class="logos">
                            <svg id="logo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                              </svg>
                            <p class="agenteinfo">{{$agente->sir}}</p>
                        </div>
                    </div>
                </div>
                <div class="accioness">
                    <div class="accion">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16" id="logotipo">
                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                        </svg>
                        <p class="ti">Ver</p>
                        <p class="ti">Agenda</p>
                    </div>
                    <div class="accion">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16" id="logotipo">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z"/>
                        </svg>
                        <p class="ti">Ver</p>
                        <p class="ti">Contactos</p>
                    </div>
                    <div class="accion">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16" id="logotipo">
                            <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
                        </svg>
                        <p class="ti">Ver</p>
                        <p class="ti">Estadisticas</p>
                    </div>
                    <div class="accion" id="accione">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" id="logotipo">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        <p class="ti">Editar</p>
                        <p class="ti">Agente</p>
                    </div>
                    <div class="accion" id="acciond">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16" id="logotipo">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                        <p class="ti">Eliminar</p>
                        <p class="ti">Agente</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
    <script src="{{ asset('js/app3.js') }}"></script>
</body>
</html>

