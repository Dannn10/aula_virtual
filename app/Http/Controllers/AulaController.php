<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Mostrar listado de aulas
     */
    public function index()
    {
        $aulas = Aula::all();
        return view('aulas.index', compact('aulas'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('aulas.create');
    }

    /**
     * Guardar nueva aula en la base
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:aulas,codigo',
            'nombre' => 'required',
            'edificio' => 'required',
            'piso' => 'required|integer',
            'capacidad' => 'required|integer|min:1',
            'tipo' => 'required',
            'descripcion' => 'nullable|string',
            'equipamiento' => 'nullable|string'
        ]);

        // Convertir equipamiento en array si viene como string "item1, item2"
        $equipamiento = $request->equipamiento
            ? array_map('trim', explode(',', $request->equipamiento))
            : null;

        Aula::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'edificio' => $request->edificio,
            'piso' => $request->piso,
            'capacidad' => $request->capacidad,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
            'disponible' => $request->disponible ? true : false,
            'equipamiento' => $equipamiento
        ]);

        return redirect()->route('aulas.index')->with('success', 'Aula creada correctamente.');
    }

    /**
     * Mostrar una aula específica
     */
    public function show(Aula $aula)
    {
        return view('aulas.show', compact('aula'));
    }

    /**
     * Editar un aula
     */
    public function edit(Aula $aula)
    {
        return view('aulas.edit', compact('aula'));
    }

    /**
     * Actualizar aula
     */
    public function update(Request $request, Aula $aula)
    {
        $request->validate([
            'codigo' => 'required|unique:aulas,codigo,' . $aula->id,
            'nombre' => 'required',
            'edificio' => 'required',
            'piso' => 'required|integer',
            'capacidad' => 'required|integer|min:1',
            'tipo' => 'required',
            'descripcion' => 'nullable|string',
            'equipamiento' => 'nullable|string'
        ]);

        $equipamiento = $request->equipamiento
            ? array_map('trim', explode(',', $request->equipamiento))
            : null;

        $aula->update([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'edificio' => $request->edificio,
            'piso' => $request->piso,
            'capacidad' => $request->capacidad,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
            'disponible' => $request->disponible ? true : false,
            'equipamiento' => $equipamiento
        ]);

        return redirect()->route('aulas.index')->with('success', 'Aula actualizada correctamente.');
    }

    /**
     * Eliminar aula
     */
    public function destroy(Aula $aula)
    {
        $aula->delete();
        return redirect()->route('aulas.index')->with('success', 'Aula eliminada correctamente.');
    }
}
