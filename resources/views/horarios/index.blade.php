@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Aulas</h1>
    <a href="{{ route('aulas.create') }}" class="btn btn-primary">Agregar Aula</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Capacidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aulas as $aula)
            <tr>
                <td>{{ $aula->id }}</td>
                <td>{{ $aula->nombre }}</td>
                <td>{{ $aula->capacidad }}</td>
                <td>
                    <a href="{{ route('aulas.show', $aula->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('aulas.edit', $aula->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('aulas.destroy', $aula->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
