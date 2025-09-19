@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Muebles</h1>
    <a href="{{ route('muebles.create') }}" class="btn btn-primary">Agregar Mueble</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($muebles as $mueble)
            <tr>
                <td>{{ $mueble->id }}</td>
                <td>{{ $mueble->nombre }}</td>
                <td>{{ $mueble->tipo }}</td>
                <td>{{ $mueble->ubicacion }}</td>
                <td>{{ $mueble->estado }}</td>
                <td>
                    <a href="{{ route('muebles.show', $mueble->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('muebles.edit', $mueble->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('muebles.destroy', $mueble->id) }}" method="POST" style="display:inline;">
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
