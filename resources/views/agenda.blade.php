<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        @include('nav')
    </header>
    <div class="todo">
      <div class="botonson" id="toggleButton2">
        >
      </div>
      <div id="toggleButton"></div>
      <div class="listas">
        <div id="dashboard" class="closed">
          <div id="hideButton"><</div>
          <hr>
          <h3>ACTIVIDADES</h3>
          <hr>
          <div class="actcuad">
            @foreach($actividades as $actividad)
              <div class="cuad-act" id="caja" data-actividad-id="{{ $actividad->id }}">
                <button class="btn btn-primary open-modal" data-bs-target="#actividadModal-{{ $actividad->id }}" data-bs-toggle="modal" id="nactividad">
                  {{ $actividad->nombre_actividad }}
                </button>
              </div>
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
                      <textarea name="nombre_actividad" id="actividadDetalle-{{ $actividad->id }}" cols="60" rows="10" class="actividadDetalle" ></textarea>
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
            @endforeach
          </div>
          <button type="button" class="btn btn-primary ag" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar Tarea
        </button>
        </div>
        <div id="content">
          <!-- Contenido principal -->
        </div> 
        <div class="dia">
          <div class="titulo">Lunes</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio Dia</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">Martes</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">Miercoles</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">Jueves</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">Viernes</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
        </div>
        <div class="diaf">
          <div class="titulo">Sabado</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
        </div>
      </div>
        <div class="agregar">
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