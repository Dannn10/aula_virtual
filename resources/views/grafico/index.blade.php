<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pokémon Stats</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #74ebd5, #ACB6E5);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      text-align: center;
    }
    h1, h2 {
      color: #333;
      margin-bottom: 20px;
    }
    button {
      padding: 15px 30px;
      font-size: 18px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      background-color: #ffcb05;
      color: #2a75bb;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover {
      background-color: #2a75bb;
      color: #fff;
    }
    #stats {
      display: none;
      background: #fff;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Página inicial -->
    <div id="home">
      <h1>Bienvenido a Pokémon Stats</h1>
      <button onclick="mostrarStats()">Ver Gráfico</button>
    </div>

    <!-- Sección de estadísticas -->
    <div id="stats">
      <h2>Pesos de Pokémon</h2>
      <canvas id="miGrafico" width="400" height="200"></canvas>
    </div>
  </div>

  <script>
    const ctx = document.getElementById('miGrafico').getContext('2d');

    async function obtenerPokemones() {
      let nombres = [];
      let pesos = [];

      for (let i = 1; i <= 5; i++) {
        const respuesta = await fetch(`https://pokeapi.co/api/v2/pokemon/${i}`);
        const data = await respuesta.json();

        nombres.push(data.name);
        pesos.push(data.weight);
      }

      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: nombres,
          datasets: [{
            label: 'Peso (hectogramos)',
            data: pesos,
            backgroundColor: [
              'rgba(255, 99, 132, 0.6)',
              'rgba(54, 162, 235, 0.6)',
              'rgba(255, 206, 86, 0.6)',
              'rgba(75, 192, 192, 0.6)',
              'rgba(153, 102, 255, 0.6)'
            ],
            borderColor: 'rgba(0,0,0,0.8)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }

    function mostrarStats() {
      document.getElementById("home").style.display = "none";
      document.getElementById("stats").style.display = "block";
      obtenerPokemones();
    }
  </script>
</body>
</html>
