@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Horarios</h1>

    <a href="{{ route('horarios.create') }}" class="btn btn-primary mb-3">Agregar Horario</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Materia ID</th>
                <th>Día</th>
                <th>Hora de inicio</th>
                <th>Hora de fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
                <tr>
                    <td>{{ $horario->id }}</td>
                    <td>{{ $horario->materia_id }}</td>
                    <td>{{ $horario->dia }}</td>
                    <td>{{ $horario->hora_inicio }}</td>
                    <td>{{ $horario->hora_fin }}</td>
                    <td>
                        <a href="{{ route('horarios.show', $horario->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar este horario?')">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
