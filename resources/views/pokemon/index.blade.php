@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="mb-4">Estadísticas de Pokémon</h1>
    <p class="lead">Gráfico de pesos de los primeros 5 Pokémon usando la PokeAPI.</p>

    <div class="card p-4 shadow">
        <canvas id="miGrafico" width="400" height="200"></canvas>
    </div>

    <div class="mt-4">
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver al Inicio</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    obtenerPokemones();
</script>
@endsection
