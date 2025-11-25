<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Mostrar listado de estudiantes.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Mostrar formulario para crear un nuevo estudiante.
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Guardar un nuevo estudiante en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email'    => 'required|email|unique:estudiantes,email',
        ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Mostrar un estudiante específico.
     */
    public function show($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.show', compact('estudiante'));
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Actualizar datos del estudiante.
     */
    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $request->validate([
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email'    => 'required|email|unique:estudiantes,email,' . $estudiante->id,
        ]);

        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante actualizado correctamente.');
    }

    /**
     * Eliminar estudiante.
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante eliminado.');
    }
}
