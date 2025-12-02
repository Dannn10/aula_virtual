<?php

namespace App\Http\Controllers;

use App\Models\Disponibilidad;
use App\Models\Aula; // Agregar este modelo
use Illuminate\Http\Request;

class DisponibilidadController extends Controller
{
    public function index()
    {
        // Obtener las aulas con sus disponibilidades
        $aulas = Aula::with('disponibilidades')->get();
        
        // Si no tienes modelo Aula, usar Disponibilidad pero renombrar la variable
        // $aulas = Disponibilidad::with('aula')->get();
        
        return view('disponibilidades.index', compact('aulas'));
    }

    public function create()
    {
        return view('disponibilidades.create');
    }

    public function store(Request $request)
    {
        Disponibilidad::create($request->all());
        return redirect()->route('disponibilidades.index');
    }

    public function show(Disponibilidad $disponibilidad)
    {
        return view('disponibilidades.show', compact('disponibilidad'));
    }

    public function edit(Disponibilidad $disponibilidad)
    {
        return view('disponibilidades.edit', compact('disponibilidad'));
    }

    public function update(Request $request, Disponibilidad $disponibilidad)
    {
        $disponibilidad->update($request->all());
        return redirect()->route('disponibilidades.index');
    }

    public function destroy(Disponibilidad $disponibilidad)
    {
        $disponibilidad->delete();
        return redirect()->route('disponibilidades.index');
    }
}