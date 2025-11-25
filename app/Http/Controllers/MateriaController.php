<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        Materia::create($request->only('nombre', 'descripcion'));

        return redirect()->route('materias.index')->with('success', 'Materia creada correctamente.');
    }

    public function show(Materia $materia)
    {
        return view('materias.show', compact('materia'));
    }

    public function edit(Materia $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        // ✅ Ahora también guarda la descripción
        $materia->update($request->only('nombre', 'descripcion'));

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada.');
    }
}
