@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Focos</h1>

    <a href="{{ route('focos.create') }}" class="btn btn-primary mb-3">+ Nuevo Foco</a>

    @if($focos->isEmpty())
        <p>No hay focos registrados.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Color</th>
                    <th>Potencia (W)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($focos as $foco)
                    <tr>
                        <td>{{ $foco->id }}</td>
                        <td>{{ $foco->color }}</td>
                        <td>{{ $foco->potencia }}</td>
                        <td>
                            <a href="{{ route('focos.edit', $foco) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('focos.destroy', $foco) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar foco?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
