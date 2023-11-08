var tipos = document.querySelector(".grafica");
tipos = tipos.getAttribute("tipo");
console.log(tipos);

var tipos = JSON.parse(tipos); // Parsear la cadena JSON

tipos = tipos.map(function(element) {
  return element.replace(/[\[\]"]/g, '');
});

var contador = {};
tipos.forEach(function(element) {
  if (contador[element]) {
    contador[element]++;
  } else {
    contador[element] = 1;
  }
});

var valores = tipos.map(function(element) {
  return contador[element];
});

valores = [...new Set(valores)];
tipos = [...new Set(tipos)];


console.log(valores);
console.log(tipos);


const chartData = {
    labels: tipos,
    data: valores,
  };
  
  const myChart = document.querySelector(".my-chart");
  const ul = document.querySelector(".programming-stats .details ul");

  const total = valores.reduce((acc, current) => acc + current, 0);

  const porcentajes = valores.map(valor => (valor / total) * 100);
  
  new Chart(myChart, {
    type: "doughnut",
    data: {
      labels: chartData.labels,
      datasets: [
        {
          label: "Contactos",
          data: chartData.data,
        },
      ],
    },
    options: {
      borderWidth: 10,
      borderRadius: 2,
      hoverBorderWidth: 0,
      plugins: {
        legend: {
          display: false,
        },
      },
    },
  });
  
  const populateUl = () => {
    chartData.labels.forEach((l, i) => {
      let li = document.createElement("li");
      li.innerHTML = `${l}: <span class='percentage'>${porcentajes[i].toFixed(2)}%</span>`;
      ul.appendChild(li);
    });
  };
  
  populateUl();

  var citas = document.querySelector("#estadisticas");
  citas = citas.getAttribute("citas");
  
  citas = JSON.parse(citas); // Parsear la cadena JSON
  

  var conteo = {
    "1": 0,
    "0": 0
  };
  
  citas.forEach(function(element) {
    if (element == 1) {
      conteo["1"]++;
    } else if (element == 0) {
      conteo["0"]++;
    }
  });
  
  var conteoFinal = [conteo["1"], conteo["0"]];

  console.log(conteoFinal)

const chartData2 = {
    labels: ['CONCRETADAS', 'NO CONCRETADAS'],
    data: conteoFinal,
  };
  
  const myChart2 = document.querySelector("#chart2");
  const ul2 = document.querySelector("#programming2 #details2 ul");

  const total2 = conteoFinal.reduce((acc, current) => acc + current, 0);

  const porcentajes2 = conteoFinal.map(valor => (valor / total2) * 100);
  var canvas2 = document.getElementById('grafica2');
  
  new Chart(canvas2, {
    type: "doughnut",
    data: {
      labels: chartData2.labels,
      datasets: [
        {
          label: "Contactos",
          data: chartData2.data,
        },
      ],
    },
    options: {
      borderWidth: 10,
      borderRadius: 2,
      hoverBorderWidth: 0,
      plugins: {
        legend: {
          display: false,
        },
      },
    },
  });
  
  const populateUl2 = () => {
    chartData2.labels.forEach((l, i) => {
      let li = document.createElement("li");
      li.innerHTML = `${l}: <span class='percentage'>${porcentajes2[i].toFixed(2)}%</span>`;
      ul2.appendChild(li);
    });
  };
  
  populateUl2();




$(document).ready(function () {
  $('#botonEnviar').on('click', function (e) {
        e.preventDefault();

        $('#miFormulario').submit();
    });
});