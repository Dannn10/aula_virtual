@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Historial de Focos</h1>
    <a href="{{ route('historialfocos.create') }}" class="btn btn-primary mb-3">Nuevo Registro</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Foco</th><th>Acción</th><th>Fecha</th><th>Acciones</th></tr></thead>
        <tbody>
            @foreach($historialfocos as $historial)
            <tr>
                <td>{{ $historial->id }}</td>
                <td>{{ $historial->foco->nombre }}</td>
                <td>{{ $historial->accion }}</td>
                <td>{{ $historial->fecha }}</td>
                <td>
                    <a href="{{ route('historialfocos.show',$historial->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('historialfocos.edit',$historial->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('historialfocos.destroy',$historial->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
