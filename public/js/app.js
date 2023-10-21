const cajas = document.querySelectorAll('#caja');
const contenedores = document.querySelectorAll('#contenedor');
var identificador = -1;

cajas.forEach(function(elemento) {
  elemento.setAttribute("draggable", "true");
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

contenedores.forEach(contenedor => {
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
    var idArrastrado = event.dataTransfer.getData("id"); //obtenemos la id del elemento del evento drag
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
  });
});
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

document.addEventListener("DOMContentLoaded", function() {
  const toggleButton = document.getElementById("toggleButton");
  const hideButton = document.getElementById("hideButton");
  const toggleButton2 = document.getElementById("toggleButton2");
  const dashboard = document.getElementById("dashboard");
  const content = document.getElementById("content");

  toggleButton.addEventListener("click", function() {
      if (dashboard.classList.contains("open")) {
          dashboard.classList.remove("open");
          content.classList.remove("pushed");
      } else {
          dashboard.classList.add("open");
          content.classList.add("pushed");
      }
  });
  toggleButton2.addEventListener("click", function() {
    if (dashboard.classList.contains("open")) {
        dashboard.classList.remove("open");
        content.classList.remove("pushed");
    } else {
        dashboard.classList.add("open");
        content.classList.add("pushed");
    }
  });
  hideButton.addEventListener("click", function() {
    dashboard.classList.remove("open");
    content.classList.remove("pushed");
  });
});







