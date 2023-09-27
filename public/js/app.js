const cajas = document.querySelectorAll('#caja');
const contenedores = document.querySelectorAll('#contenedor');

cajas.forEach(function(elemento) {
  elemento.setAttribute("draggable", "true");
});

document.addEventListener("dragstart", function(event) {
  event.dataTransfer.setData("text/plain", event.target.className);
  var elementoArrastrado = event.target;
  var claseDelElementoArrastrado = elementoArrastrado.className;
  if(claseDelElementoArrastrado == 'cuadros'){
    event.dataTransfer.setData("text/plain2", event.target.textContent);
    elementoArrastrado.removeChild(elementoArrastrado.querySelector('p'));
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
  contenedor.addEventListener('drop', function(event) {
    console.log('Drop');
    event.preventDefault();
    var elementoArrastrado = event.dataTransfer.getData("text/plain");
    console.log(elementoArrastrado)
    if(elementoArrastrado == 'cuad-act'){
      if (!contenedor.querySelector('p')) {
        const textocabronson = document.createElement('p');
        textocabronson.textContent = 'si se pudo mi chingon';
        contenedor.appendChild(textocabronson);
      }
    }
    if(elementoArrastrado == 'cuadros'){
      var text = event.dataTransfer.getData("text/plain2");
      if (!contenedor.querySelector('p')) {
        const textocabronson = document.createElement('p');
        textocabronson.textContent = text;
        contenedor.appendChild(textocabronson);
      }
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
        console.log(contenido);
        actividadDetalle.value = contenido;
        $("#actividadModal-" + actividadId).modal("show");
    });
});







