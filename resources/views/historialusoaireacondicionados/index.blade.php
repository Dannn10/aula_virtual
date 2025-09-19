@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Historial de Uso - Aires Acondicionados</h1>
    <a href="{{ route('historialusoaireacondicionados.create') }}" class="btn btn-primary">Agregar Registro</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aire Acondicionado</th>
                <th>Fecha Uso</th>
                <th>Duración (min)</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historialusoaireacondicionados as $historial)
            <tr>
                <td>{{ $historial->id }}</td>
                <td>{{ $historial->aireacondicionado->modelo ?? 'N/A' }}</td>
                <td>{{ $historial->fecha_uso }}</td>
                <td>{{ $historial->duracion }}</td>
                <td>{{ $historial->usuario }}</td>
                <td>
                    <a href="{{ route('historialusoaireacondicionados.show', $historial->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('historialusoaireacondicionados.edit', $historial->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('historialusoaireacondicionados.destroy', $historial->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
