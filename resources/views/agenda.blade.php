<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        @include('nav')
    </header>
    <div class="todo">
        <div class="agenda">
            <div class="linea">
                <div class="reloj"><img src="{{ asset('images\reloj.png') }}"></div>
                <div class="dias">Lunes</div>
                <div class="dias">Martes</div>
                <div class="dias">Miercoles</div>
                <div class="dias">Jueves</div>
                <div class="dias">Viernes</div>
                <div class="dias">Sabado</div>
            </div>
            <div class="linea">
                <div class="tiempo">Matutina</div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
            </div>
            <div class="linea">
                <div class="tiempo">Media dia</div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
            </div>
            <div class="linea">
                <div class="tiempo">Vespertina</div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
                <div class="cuadros" id="contenedor" draggable="true"></div>
            </div>
        </div>
        <div class="act-y-btn">
            <div id="carouselExample" class="carousel slide actividades">
              <div class="carousel-inner">
                @foreach($actividades->chunk(4) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="cuads-act" id="cuads-act">
                          @foreach($chunk as $actividad)
                          <div class="cuad-act" id="caja" data-actividad-id="{{ $actividad->id }}">
                              <p class="nactividad" id="nactividad">{{ $actividad->nombre_actividad }}</p>
                              <p class="nid">{{ $actividad->id }}</p>
                              <button class="btn btn-primary open-modal" data-bs-target="#actividadModal-{{ $actividad->id }}" data-bs-toggle="modal">
                                {{ $actividad->nombre_actividad }}
                              </button>
                              <div class="modal fade" id="actividadModal-{{ $actividad->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles de la actividad</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <h5 id="numeroact"></h5>
                                      <form action="{{ url('actividades/'.$actividad->id) }}" method="POST" id="editform">
                                      <textarea name="nombre_actividad" id="actividadDetalle-{{ $actividad->id }}" cols="86" rows="10" class="actividadDetalle" ></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        {{ method_field('PUT') }}
                                        <button type="text" class="btn btn-warning" id="edit_mostrar">Editar</button>
                                      </form>
                                      <form action="{{ url('actividades/'.$actividad->id) }}" method="POST" id="deleteform">
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger" id="delete_btn">Eliminar</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                          @endforeach
                        </div>
                    </div>
                @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <button type="button" class="btn btn-info custom">Agendar</button>
        </div>
        <div class="agregar">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Agregar Tarea
          </button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Agrega una actividad</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('actividades') }}" method="POST">
                    <div class="mb-3">
                      <label for="actividadInput" class="form-label">Actividad</label>
                      <input type="text" class="form-control" id="actividadInput" name="nombre_actividad" aria-describedby="emailHelp" required>
                      <div id="emailHelp" class="form-text">Esta actividad se mostrará para los agentes inmobiliarios</div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary" id="guardarActividad">Guardar Actividad</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
         </div>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>