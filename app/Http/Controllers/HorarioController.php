<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Materia;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        // Trae todas las materias para mostrarlas en el formulario
        $materias = Materia::all();
        return view('horarios.create', compact('materias'));
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'materia_id'  => 'required|exists:materias,id',
            'dia'         => 'required|string|max:50',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin'    => 'required|date_format:H:i|after:hora_inicio',
        ]);

        // Crear el horario
        Horario::create($request->only('materia_id', 'dia', 'hora_inicio', 'hora_fin'));

        return redirect()->route('horarios.index')->with('success', 'Horario guardado correctamente.');
    }

    public function show(Horario $horario)
    {
        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario)
    {
        // Trae las materias para el select en el formulario de edición
        $materias = Materia::all();
        return view('horarios.edit', compact('horario', 'materias'));
    }

    public function update(Request $request, Horario $horario)
    {
        // Validación de los datos
        $request->validate([
            'materia_id'  => 'required|exists:materias,id',
            'dia'         => 'required|string|max:50',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin'    => 'required|date_format:H:i|after:hora_inicio',
        ]);

        // Actualizar el horario
        $horario->update($request->only('materia_id', 'dia', 'hora_inicio', 'hora_fin'));

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado correctamente.');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado correctamente.');
    }
}
