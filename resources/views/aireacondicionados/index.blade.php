@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aires Acondicionados</h1>
    <a href="{{ route('airesacondicionados.create') }}" class="btn btn-primary mb-3">Nuevo Aire</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($airesacondicionados as $aire)
            <tr>
                <td>{{ $aire->id }}</td>
                <td>{{ $aire->ubicacion }}</td>
                <td>{{ $aire->estado }}</td>
                <td>
                    <a href="{{ route('airesacondicionados.edit', $aire) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('airesacondicionados.destroy', $aire) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que querés borrar este aire?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
