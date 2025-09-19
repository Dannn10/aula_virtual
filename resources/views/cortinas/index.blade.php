@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Listado de Cortinas</h1>
    <a href="{{ route('cortinas.create') }}" class="btn btn-primary mb-3">Nueva Cortina</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Nombre</th><th>Estado</th><th>Acciones</th></tr></thead>
        <tbody>
            @foreach($cortinas as $cortina)
            <tr>
                <td>{{ $cortina->id }}</td>
                <td>{{ $cortina->nombre }}</td>
                <td>{{ $cortina->estado }}</td>
                <td>
                    <a href="{{ route('cortinas.show',$cortina->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('cortinas.edit',$cortina->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('cortinas.destroy',$cortina->id) }}" method="POST" style="display:inline">
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
