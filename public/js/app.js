const cajas = document.querySelectorAll('#caja');
const contenedores = document.querySelectorAll('.dropc');
var identificador = -1;
var permiso = document.querySelector('.todo');
permiso = permiso.getAttribute("permiso");
var exito = -1;
let currentContenedor = null;

if(permiso=="limited"){
cajas.forEach(function(elemento) {
  elemento.setAttribute("draggable", "true");
});



contenedores.forEach(contenedor=> {
  contenedor.addEventListener('touchstart', function(event) {
    console.log("naaaa")
  });
});


document.addEventListener("dragstart", function(event) {
  event.dataTransfer.setData("text/plain", event.target.className); //envias la clase del objeto arrastrado
  event.dataTransfer.setData("id", event.target.id); //envias la id del objeto arrastrado
  var elementoArrastrado = event.target; //iguala el objeto que estas arrastrando a una variable 
  var claseDelElementoArrastrado = elementoArrastrado.className; // obtiene la clase del elemento arrastradro
  if(claseDelElementoArrastrado == 'cho'){  //comparativa para saber si se estan arrastrando tareas DENTRO DE LA MISMA AGENDA, es decir no arrastrar una actividad desde fuera
    event.dataTransfer.setData("texto2", event.target.textContent);//obtengo el texto del objeto arrastrado
    event.dataTransfer.setData("text/plain4", event.target.getAttribute("data-actividad-id"));
  }
  if(claseDelElementoArrastrado == 'cuad-act'){
    event.dataTransfer.setData("text/plain3", event.target.getAttribute("data-actividad-id"));
    event.dataTransfer.setData("texto", event.target.textContent);
  }


});

document.addEventListener("dragend", function(event) {
  document.getElementById('borraractt').style.opacity = 0;
});

var borrar = document.getElementById("borraractt");
var borrart = document.getElementById("borraract");

borrar.addEventListener('dragenter', function(event) {
});

borrar.addEventListener('dragleave', function(event) {
  event.preventDefault();
  setTimeout(function () {
    borrar.style.backgroundColor = '#b7b6b6';
    borrart.setAttribute('fill', '#505050');
    borrar.classList.remove('dragging');
  }, 100);
});

borrar.addEventListener('dragover', function(event) {
  event.preventDefault();
  setTimeout(function () {
    borrar.style.backgroundColor = '#bb0d0d';
    borrart.setAttribute('fill', '#ffffff');
    borrar.classList.add('dragging');
  }, 10);
});

borrar.addEventListener('drop', function(event) {
  event.preventDefault();
  var idArrastrado = event.dataTransfer.getData("id");
  var idArrastrado = document.getElementById(idArrastrado);
  idArrastrado.parentNode.removeChild(idArrastrado);
  borrar.style.backgroundColor = '#b7b6b6';
  borrart.setAttribute('fill', '#505050');
  borrar.classList.remove('dragging');
  document.getElementById('borraractt').style.opacity = 0;
});


contenedores.forEach(contenedor => {
  contenedor.addEventListener('dragstart', e => {
    document.getElementById('borraractt').style.opacity = 1;
  });
  contenedor.addEventListener('dragenter', e => {
  });
  contenedor.addEventListener('dragleave', e => {
  });
  contenedor.addEventListener('dragover', e => {
    e.preventDefault();
  });
  contenedor.addEventListener('drop', function(event) { //entramos al evento drop
    console.log('Drop');
    event.preventDefault();
    var actid = event.dataTransfer.getData("text/plain3");
    var actid2 = event.dataTransfer.getData("text/plain4");
    var texto = event.dataTransfer.getData("texto");
    var elementoArrastrado = event.dataTransfer.getData("text/plain"); //obtenemos la clase del elemento del evento drag
    var idArrastrado = event.dataTransfer.getData("id");
    var idArrastrado = document.getElementById(idArrastrado);
    var dataArray = contenedor.getAttribute("data-array");
    var miArray;
    if(dataArray){
      miArray = JSON.parse(dataArray)
    }else{
      miArray = [];
    }
    var nuevoValor = JSON.stringify(miArray);
    contenedor.setAttribute("data-array", nuevoValor);

    console.log(elementoArrastrado);
    if(elementoArrastrado == 'cuad-act'){ //si el elemento arrastrado viene de actividades del carrusel
      const actividadarrastrada = document.createElement('div'); // crea un elemento div
      actividadarrastrada.textContent = texto; // crea texto para ese elemento
      actividadarrastrada.classList.add('cho');
      actividadarrastrada.setAttribute('data-actividad-id', actid);
      actividadarrastrada.id = identificador;
      identificador = identificador + 1;
      actividadarrastrada.setAttribute("draggable", "true");
      contenedor.appendChild(actividadarrastrada); //lo agrega al contenedor
    }
    if(elementoArrastrado == 'cho'){ //si el elemento es una actividad que ya esta en la agenda, es decir, que se quiere pasar a otro dia por asi decirlo
      var texto2 = event.dataTransfer.getData("texto2"); // obtenemos los datos que enviamos en el eventro drag, en este caso el texto
      const actividadarrastrada = document.createElement('div'); // crea un elemento div
      actividadarrastrada.textContent = texto2; // crea texto para ese elemento
      actividadarrastrada.classList.add('cho');
      actividadarrastrada.setAttribute('data-actividad-id', actid2);
      actividadarrastrada.id = identificador;
      identificador = identificador + 1;
      actividadarrastrada.setAttribute("draggable", "true");
      contenedor.appendChild(actividadarrastrada); //lo agrega al contenedor
      idArrastrado.parentNode.removeChild(idArrastrado);
    }

    document.getElementById('borraractt').style.opacity = 0;
  });
});
function agendar(nombreActividad, idActividad) {
  var selectedValue = document.getElementById('selectMomento-' + idActividad).value;
  var diaDiv = document.getElementById(selectedValue);
  if (diaDiv) {
    var nuevoElemento = document.createElement('div');
    nuevoElemento.className = 'cho';
    nuevoElemento.textContent = nombreActividad;
    nuevoElemento.setAttribute('data-actividad-id', idActividad);
    nuevoElemento.id = identificador;
    identificador = identificador + 1;
    nuevoElemento.setAttribute('draggable', 'true');
    diaDiv.appendChild(nuevoElemento);
  }
  $('#agendar-' + idActividad).modal('hide');
}
}


if(permiso=="full"){
var cuadrosDeActividades = document.querySelectorAll(".cuad-act");
cuadrosDeActividades.forEach(function(cuadro) {
    var botonModal = cuadro.querySelector(".open-modal");
    var actividadId = cuadro.getAttribute("data-actividad-id");
    var actividadDetalle = document.getElementById("actividadDetalle-" + actividadId);
    botonModal.addEventListener("click", function() {
        var contenido = cuadro.querySelector("#nactividad");
        var contenido = contenido.textContent || contenido.innerText;
        contenido = contenido.replace(/\n/g, '');
        contenido = contenido.trim();
        console.log(contenido);
        actividadDetalle.value = contenido;
        $("#actividadModal-" + actividadId).modal("show");
    });
});
}
document.addEventListener("DOMContentLoaded", function() {
  const toggleButton = document.getElementById("toggleButton");
  const hideButton = document.getElementById("hideButton");
  const toggleButton2 = document.getElementById("toggleButton2");
  const dashboard = document.getElementById("dashboard");
  const content = document.getElementById("content");
  const menunav = document.querySelector("#btn_nav_menu");
  const nav = document.querySelector("#navbarSupportedContent");

  toggleButton.addEventListener("click", function() {
      if (dashboard.classList.contains("open")) {
          dashboard.classList.remove("open");
          content.classList.remove("pushed");
      } else {
        if (nav && nav.classList.contains('show')) {
          menunav.click();
        }
          dashboard.classList.add("open");
          content.classList.add("pushed");
      }
  });
  toggleButton2.addEventListener("click", function() {
    if (dashboard.classList.contains("open")) {
        dashboard.classList.remove("open");
        content.classList.remove("pushed");
    } else {
      if (nav && nav.classList.contains('show')) {
        menunav.click();
      }
        dashboard.classList.add("open");
        content.classList.add("pushed");
    }
  });
  hideButton.addEventListener("click", function() {
    dashboard.classList.remove("open");
    content.classList.remove("pushed");
  });
  menunav.addEventListener("click", function() {
    if (dashboard.classList.contains("open")) {
      dashboard.classList.remove("open");
      content.classList.remove("pushed");
    }
  });
});

const botonCrearInput = document.getElementById("editaragenda");
const contenedorInputs = document.getElementById("contenedorInputs");
botonCrearInput.addEventListener("click", function() {
  const nuevoInput = document.createElement("input");
  nuevoInput.setAttribute("hidden", true);

  // Agrega el nuevo input al contenedor
  contenedorInputs.appendChild(nuevoInput);
});

$('#guardar-agenda').click(function() {
  const inputano = document.getElementById('inputAno');
  const inputmes = document.getElementById('inputMes');
  const inputsemana = document.getElementById('inputSemana');

  const selectedAnos = inputano.value;
  const selectedmes = inputmes.value;
  const selectedsemanass = inputsemana.value;

  const selectedAno = parseInt(selectedAnos, 10);
  const selectedsemanas = parseInt(selectedsemanass, 10);

  var user_id = document.getElementById('contenedorInputs');
  const si = user_id.getAttribute("user-id");
  var user_id = parseInt(si, 10);

  const lunes_mañana = document.getElementById("Lunes-m");
  const lunes_medio = document.getElementById("Lunes-me");
  const lunes_ves = document.getElementById("Lunes-ves");
  const martes_mañana = document.getElementById("Martes-m");
  const martes_medio = document.getElementById("Martes-me");
  const martes_ves = document.getElementById("Martes-ves");
  const miercoles_mañana = document.getElementById("Miercoles-m");
  const miercoles_medio = document.getElementById("Miercoles-me");
  const miercoles_ves = document.getElementById("Miercoles-ves");
  const jueves_mañana = document.getElementById("Jueves-m");
  const jueves_medio = document.getElementById("Jueves-me");
  const jueves_ves = document.getElementById("Jueves-ves");
  const viernes_mañana = document.getElementById("Viernes-m");
  const viernes_medio = document.getElementById("Viernes-me");
  const viernes_ves = document.getElementById("Viernes-ves");
  const sabado_mañana = document.getElementById("Sabado-m");
  const sabado_medio = document.getElementById("Sabado-me");
  const sabado_ves = document.getElementById("Sabado-ves");

  const act_lunes_mañana = lunes_mañana.querySelectorAll('.cho');
  const act_lunes_medio = lunes_medio.querySelectorAll('.cho');
  const act_lunes_ves = lunes_ves.querySelectorAll('.cho');
  const act_martes_mañana = martes_mañana.querySelectorAll('.cho');
  const act_martes_medio = martes_medio.querySelectorAll('.cho');
  const act_martes_ves = martes_ves.querySelectorAll('.cho');
  const act_miercoles_mañana = miercoles_mañana.querySelectorAll('.cho');
  const act_miercoles_medio = miercoles_medio.querySelectorAll('.cho');
  const act_miercoles_ves = miercoles_ves.querySelectorAll('.cho');
  const act_jueves_mañana = jueves_mañana.querySelectorAll('.cho');
  const act_jueves_medio = jueves_medio.querySelectorAll('.cho');
  const act_jueves_ves = jueves_ves.querySelectorAll('.cho');
  const act_viernes_mañana = viernes_mañana.querySelectorAll('.cho');
  const act_viernes_medio = viernes_medio.querySelectorAll('.cho');
  const act_viernes_ves = viernes_ves.querySelectorAll('.cho');
  const act_sabado_mañana = sabado_mañana.querySelectorAll('.cho');
  const act_sabado_medio = sabado_medio.querySelectorAll('.cho');
  const act_sabado_ves = sabado_ves.querySelectorAll('.cho');

  $.ajax({
    type: 'POST',
    url: checkDuplicateUrl,
    data: {
        ano: selectedAno,
        mes: selectedmes,
        semana: selectedsemanas,
    },
    success: function(response) {
        if (response.message === 'no') {
          var x = document.getElementById("snackbar3");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        } else {
          if (act_lunes_mañana.length === 0) {

          } else {
            act_lunes_mañana.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 1,
                  momento_dia: 'Mañana',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_lunes_medio.length === 0) {
        
          } else {
            act_lunes_medio.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 1,
                  momento_dia: 'Tarde',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_lunes_ves.length === 0) {
        
          } else {
            act_lunes_ves.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 1,
                  momento_dia: 'Noche',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_martes_mañana.length === 0) {
        
          } else {
            act_martes_mañana.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 2,
                  momento_dia: 'Mañana',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_martes_medio.length === 0) {
        
          } else {
            act_martes_medio.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 2,
                  momento_dia: 'Tarde',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_martes_ves.length === 0) {
        
          } else {
            act_martes_ves.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 2,
                  momento_dia: 'Noche',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_miercoles_mañana.length === 0) {
        
          } else {
            act_miercoles_mañana.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 3,
                  momento_dia: 'Mañana',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_miercoles_medio.length === 0) {
        
          } else {
            act_miercoles_medio.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 3,
                  momento_dia: 'Tarde',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_miercoles_ves.length === 0) {
        
          } else {
            act_miercoles_ves.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 3,
                  momento_dia: 'Noche',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_jueves_mañana.length === 0) {
        
          } else {
            act_jueves_mañana.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 4,
                  momento_dia: 'Mañana',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_jueves_medio.length === 0) {
        
          } else {
            act_jueves_medio.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 4,
                  momento_dia: 'Tarde',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_jueves_ves.length === 0) {
        
          } else {
            act_jueves_ves.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 4,
                  momento_dia: 'Noche',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_viernes_mañana.length === 0) {
        
          } else {
            act_viernes_mañana.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 5,
                  momento_dia: 'Mañana',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_viernes_medio.length === 0) {
        
          } else {
            act_viernes_medio.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 5,
                  momento_dia: 'Tarde',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_viernes_ves.length === 0) {
        
          } else {
            act_viernes_ves.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 5,
                  momento_dia: 'Noche',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_sabado_mañana.length === 0) {
        
          } else {
            act_sabado_mañana.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 6,
                  momento_dia: 'Mañana',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_sabado_medio.length === 0) {
        
          } else {
            act_sabado_medio.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 6,
                  momento_dia: 'Tarde',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
          if (act_sabado_ves.length === 0) {
        
          } else {
            act_sabado_ves.forEach(actividades => {
              const si = actividades.getAttribute("data-actividad-id");
              const actividadID = parseInt(si, 10);
                $.ajax({
                type: 'POST',
                url: agendaStoreUrl,
                data: {
                  dia_semana_id: 6,
                  momento_dia: 'Noche',
                  estado: 0,
                  actividad_id: actividadID,
                  user_id: user_id,
                  ano: selectedAno,
                  mes: selectedmes,
                  semana: selectedsemanas,
                },
                success: function(response) {
                  if(response.message == 'si'){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  var x = document.getElementById("snackbar2");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
            });
          }
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      var x = document.getElementById("snackbar2");
      x.className = "show";
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
  });
});

const dashboardd = document.getElementById("dashboard");
const menunav = document.querySelector("btn_nav_menu");
menunav.addEventListener("click", function() {
  if (dashboardd.classList.contains("open")) {
    dashboardd.classList.remove("open");
    content.classList.remove("pushed");
    showToggleButtons();
  }
});






