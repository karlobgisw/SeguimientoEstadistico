<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CirculoInfluencia</title>
    <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        @include('nav')
    </header>
    <button type="button" class="btn btn-success" id="btn_agregar" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="{{ asset('images\agregar.png') }}" alt="" id="suma">
    </button>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" id="modal">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Registro</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="bloque1">
                    <div class="a">
                        <label for="Nombre">Nombre Completo:</label>
                        <br>
                        <input type="text" name="Nombre">
                        <br>
                        <br>
                        <label for="Telefono">Telefono:</label>
                        <br>
                        <input type="text" name="Telefono">
                        <br>
                        <br>
                        <label for="Correo">Correo:</label>
                        <br>
                        <input type="text" name="Correo">
                        <br>
                        <br>
                        <label for="fuente-de-contacto">Fuente de contacto:</label>
                        <br>
                        <select id="fuente-de-contacto" name="fuente-de-contacto" class="selector">
                            <option value="opcion1">Opción 1</option>
                            <option value="opcion2">Opción 2</option>
                            <option value="opcion3">Opción 3</option>
                        </select>
                        <br>
                        <br>
                        <label for="posible">Posible:</label>
                        <br>
                        <select id="posible" name="posible" class="selector">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Comprador</option>
                            <option value="opcion2">Vendedor</option>
                            <option value="opcion3">Arrendador</option>
                            <option value="opcion3">Arrendatario</option>
                            <option value="opcion3">Referido</option>
                        </select>
                        <br>
                        <br>
                        <label for="clasificacion">Clasificacion:</label>  
                        <br>
                        <select id="clasificacion" name="clasificacion" class="selector">
                            <option value="opcion1">---</option>
                            <option value="opcion2">A</option>
                            <option value="opcion3">B</option>
                        </select>
                        <br>
                        <br>
                        <label for="llamada">LLamada</label>
                        <br>
                        <select id="llamada" name="llamada" class="selector">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Verdadero</option> 
                            <option value="opcion2">Falso</option>
                        </select>
                        <br>
                        <br>
                        <label for="Contestada">Contestada</label>
                        <br>
                        <select id="contestada" name="contestada" class="selector">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Contestada</option> 
                            <option value="opcion2">Rechazada</option>
                        </select>
                        <br>
                        <br>
                        <label for="interesado">Interesado</label>
                        <br>
                        <select id="interesado" name="interesado" class="selector">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Interesado</option> 
                            <option value="opcion2">No interesado</option>
                        </select>
                        <br>
                        <br>
                        <label for="interesado">Interesado</label>
                        <br>
                        <select id="interesado" name="interesado" class="selector">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Interesado</option> 
                            <option value="opcion2">No interesado</option>
                        </select>
                        <br>
                        <br>
                        <label for="cita">Cita</label>
                        <br>
                        <select id="cita" name="cita" class="selector">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Citado</option> 
                            <option value="opcion2">No citado</option>
                        </select>
                        <br>
                        <br>
                    </div>
                    <div class="b"> 
                        <label for="CLAVE_SIR">CLAVE SIR</label>
                        <br>
                        <select id="CLAVE_SIR" name="CLAVE_SIR" class="selector2">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Tiene</option> 
                            <option value="opcion2">No tiene</option>
                        </select>
                        <br>
                        <br>
                        <label for="FOVISSSTE">FOVISSSTE</label>
                        <br>
                        <select id="FOVISSSTE" name="FOVISSSTE" class="selector2">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Tiene</option> 
                            <option value="opcion2">No tiene</option>
                        </select>
                        <br>
                        <br>
                        <label for="INFONAVIT">INFONAVIT</label>
                        <br>
                        <select id="INFONAVIT" name="INFONAVIT" class="selector2">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Tiene</option> 
                            <option value="opcion2">No tiene</option>
                        </select>
                        <br>
                        <br>
                        <label for="BANCARIO">Interesado</label>
                        <br>
                        <select id="interesado" name="interesado" class="selector2">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Interesado</option> 
                            <option value="opcion2">No interesado</option>
                        </select>
                        <br>
                        <br>
                        <label for="Comentario">Comentario:</label>
                        <br>
                        <input type="text" name="Comentario">
                        <br>
                        <br>
                        <label for="Valor">Valor:</label>
                        <br>
                        <input type="text" name="Valor">
                        <br>
                        <br>
                        <label for="Semana">Semana:</label>
                        <br>
                        <input type="text" name="Semana">
                        <br>
                        <br>
                        <label for="Mes">Mes</label>
                        <br>
                        <select id="Mes" name="Mes" class="selector2">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Enero</option> 
                            <option value="opcion2">Febrero</option>
                            <option value="opcion1">Marzo</option> 
                            <option value="opcion2">Abril</option>
                            <option value="opcion1">Mayo</option> 
                            <option value="opcion2">Junio</option>
                            <option value="opcion1">Julio</option> 
                            <option value="opcion2">Agosto</option>
                            <option value="opcion1">Septiembre</option> 
                            <option value="opcion2">Octubre</option>
                            <option value="opcion1">Noviembre</option> 
                            <option value="opcion2">Diciembre</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger">Eliminar</button>
              <button type="button" class="btn btn-warning">Guardar Cambios</button>
            </div>
          </div>
        </div>
      </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" id="modal">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Registro</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="bloque1">
                    <div class="a">
                        <label for="Nombre">Nombre Completo:</label>
                        <br>
                        <input type="text" name="Nombre">
                        <br>
                        <br>
                        <label for="Telefono">Telefono:</label>
                        <br>
                        <input type="text" name="Telefono">
                        <br>
                        <br>
                        <label for="Correo">Correo:</label>
                        <br>
                        <input type="text" name="Correo">
                        <br>
                        <br>
                        <label for="fuente-de-contacto">Fuente de contacto:</label>
                        <br>
                        <select id="fuente-de-contacto" name="fuente-de-contacto" class="selector">
                            <option value="opcion1">Opción 1</option>
                            <option value="opcion2">Opción 2</option>
                            <option value="opcion3">Opción 3</option>
                        </select>
                        <br>
                        <br>
                        <label for="posible">Posible:</label>
                        <br>
                        <select id="posible" name="posible" class="selector">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Comprador</option>
                            <option value="opcion2">Vendedor</option>
                            <option value="opcion3">Arrendador</option>
                            <option value="opcion3">Arrendatario</option>
                            <option value="opcion3">Referido</option>
                        </select>
                        <br>
                        <br>
                        <label for="clasificacion">Clasificacion:</label>  
                        <br>
                        <select id="clasificacion" name="clasificacion" class="selector">
                            <option value="opcion1">---</option>
                            <option value="opcion2">A</option>
                            <option value="opcion3">B</option>
                        </select>
                        <br>
                        <br>
                        <label for="llamada">LLamada</label>
                        <br>
                        <select id="llamada" name="llamada" class="selector">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Verdadero</option> 
                            <option value="opcion2">Falso</option>
                        </select>
                        <br>
                        <br>
                        <label for="Contestada">Contestada</label>
                        <br>
                        <select id="contestada" name="contestada" class="selector">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Contestada</option> 
                            <option value="opcion2">Rechazada</option>
                        </select>
                        <br>
                        <br>
                        <label for="interesado">Interesado</label>
                        <br>
                        <select id="interesado" name="interesado" class="selector">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Interesado</option> 
                            <option value="opcion2">No interesado</option>
                        </select>
                        <br>
                        <br>
                        <label for="interesado">Interesado</label>
                        <br>
                        <select id="interesado" name="interesado" class="selector">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Interesado</option> 
                            <option value="opcion2">No interesado</option>
                        </select>
                        <br>
                        <br>
                        <label for="cita">Cita</label>
                        <br>
                        <select id="cita" name="cita" class="selector">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Citado</option> 
                            <option value="opcion2">No citado</option>
                        </select>
                        <br>
                        <br>
                    </div>
                    <div class="b"> 
                        <label for="CLAVE_SIR">CLAVE SIR</label>
                        <br>
                        <select id="CLAVE_SIR" name="CLAVE_SIR" class="selector2">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Tiene</option> 
                            <option value="opcion2">No tiene</option>
                        </select>
                        <br>
                        <br>
                        <label for="FOVISSSTE">FOVISSSTE</label>
                        <br>
                        <select id="FOVISSSTE" name="FOVISSSTE" class="selector2">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Tiene</option> 
                            <option value="opcion2">No tiene</option>
                        </select>
                        <br>
                        <br>
                        <label for="INFONAVIT">INFONAVIT</label>
                        <br>
                        <select id="INFONAVIT" name="INFONAVIT" class="selector2">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Tiene</option> 
                            <option value="opcion2">No tiene</option>
                        </select>
                        <br>
                        <br>
                        <label for="BANCARIO">Interesado</label>
                        <br>
                        <select id="interesado" name="interesado" class="selector2">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Interesado</option> 
                            <option value="opcion2">No interesado</option>
                        </select>
                        <br>
                        <br>
                        <label for="Comentario">Comentario:</label>
                        <br>
                        <input type="text" name="Comentario">
                        <br>
                        <br>
                        <label for="Valor">Valor:</label>
                        <br>
                        <input type="text" name="Valor">
                        <br>
                        <br>
                        <label for="Semana">Semana:</label>
                        <br>
                        <input type="text" name="Semana">
                        <br>
                        <br>
                        <label for="Mes">Mes</label>
                        <br>
                        <select id="Mes" name="Mes" class="selector2">
                            <option value="opcion3">---</option>
                            <option value="opcion1">Enero</option> 
                            <option value="opcion2">Febrero</option>
                            <option value="opcion1">Marzo</option> 
                            <option value="opcion2">Abril</option>
                            <option value="opcion1">Mayo</option> 
                            <option value="opcion2">Junio</option>
                            <option value="opcion1">Julio</option> 
                            <option value="opcion2">Agosto</option>
                            <option value="opcion1">Septiembre</option> 
                            <option value="opcion2">Octubre</option>
                            <option value="opcion1">Noviembre</option> 
                            <option value="opcion2">Diciembre</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    <div class="contenedor">
        <table>
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Fuente de Contacto</th>
                    <th>Posible</th>
                    <th>Clasificacion</th>
                    <th>LLamada</th>
                    <th>Contestada</th>
                    <th>Interesado</th>
                    <th>Cita</th>
                    <th>CLAVE SIR</th>
                    <th>FOVISSSTE</th>
                    <th>INFONAVIT</th>
                    <th>BANCARIO</th>
                    <th>Comentario</th>
                    <th>Valor</th>
                    <th>Semana</th>
                    <th>Mes</th>
                </tr>
            </thead>
            <tbody>
                <tr id="registro">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/app2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>