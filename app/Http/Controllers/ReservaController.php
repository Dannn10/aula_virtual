<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Docente;
use App\Models\Aula;
use App\Models\Materia;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservaController extends Controller
{
    // Mostrar listado de reservas
    public function index()
    {
        $reservas = Reserva::with(['docente', 'aula', 'materia'])->get();
        return view('reservas.index', compact('reservas'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $docentes = Docente::all();
        $aulas = Aula::all();
        $materias = Materia::all();

        return view('reservas.create', compact('docentes', 'aulas', 'materias'));
    }

    // Función auxiliar para separar nombre y apellido
    protected function splitName($fullName)
    {
        $fullName = trim(preg_replace('/\s+/', ' ', $fullName));
        if (empty($fullName)) {
            return ['', ''];
        }

        $parts = explode(' ', $fullName);
        if (count($parts) === 1) {
            return [$parts[0], ''];
        }

        $apellido = array_pop($parts);
        $nombre = implode(' ', $parts);

        return [$nombre, $apellido];
    }

    // Guardar una nueva reserva
    public function store(Request $request)
    {
        $request->validate([
            'docente_name' => 'required|string|max:255',
            'aula_name' => 'required|string|max:255',
            'materia_name' => 'required|string|max:255',
            'fecha_inicio' => 'required|date_format:Y-m-d\TH:i',
            'fecha_fin' => 'required|date_format:Y-m-d\TH:i|after:fecha_inicio',
        ]);

        // Buscar o crear docente
        [$nombre, $apellido] = $this->splitName($request->docente_name);
        $docente = Docente::firstOrCreate(
            ['nombre' => $nombre, 'apellido' => $apellido],
            ['email' => null]
        );

        // Buscar o crear aula
        $aula = Aula::firstOrCreate(['nombre' => $request->aula_name]);

        // Buscar o crear materia
        $materia = Materia::firstOrCreate(['nombre' => $request->materia_name]);

        // Convertir fechas
        $fi = Carbon::createFromFormat('Y-m-d\TH:i', $request->fecha_inicio)->toDateTimeString();
        $ff = Carbon::createFromFormat('Y-m-d\TH:i', $request->fecha_fin)->toDateTimeString();

        // Crear reserva
        Reserva::create([
            'docente_id' => $docente->id,
            'aula_id' => $aula->id,
            'materia_id' => $materia->id,
            'fecha_inicio' => $fi,
            'fecha_fin' => $ff,
        ]);

        return redirect()->route('reservas.index')->with('success', 'Reserva creada correctamente.');
    }

    // Mostrar formulario de edición
    public function edit(Reserva $reserva)
    {
        $docentes = Docente::all();
        $aulas = Aula::all();
        $materias = Materia::all();

        return view('reservas.edit', compact('reserva', 'docentes', 'aulas', 'materias'));
    }

    // Actualizar una reserva existente
    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'docente_name' => 'required|string|max:255',
            'aula_name' => 'required|string|max:255',
            'materia_name' => 'required|string|max:255',
            'fecha_inicio' => 'required|date_format:Y-m-d\TH:i',
            'fecha_fin' => 'required|date_format:Y-m-d\TH:i|after:fecha_inicio',
        ]);

        // Buscar o crear docente
        [$nombre, $apellido] = $this->splitName($request->docente_name);
        $docente = Docente::firstOrCreate(
            ['nombre' => $nombre, 'apellido' => $apellido],
            ['email' => null]
        );

        // Buscar o crear aula y materia
        $aula = Aula::firstOrCreate(['nombre' => $request->aula_name]);
        $materia = Materia::firstOrCreate(['nombre' => $request->materia_name]);

        // Convertir fechas
        $fi = Carbon::createFromFormat('Y-m-d\TH:i', $request->fecha_inicio)->toDateTimeString();
        $ff = Carbon::createFromFormat('Y-m-d\TH:i', $request->fecha_fin)->toDateTimeString();

        // Actualizar datos
        $reserva->update([
            'docente_id' => $docente->id,
            'aula_id' => $aula->id,
            'materia_id' => $materia->id,
            'fecha_inicio' => $fi,
            'fecha_fin' => $ff,
        ]);

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada correctamente.');
    }

    // Eliminar una reserva
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada correctamente.');
    }

    public function show($id)
{
    // Buscar la reserva junto con las relaciones
    $reserva = Reserva::with(['docente', 'aula', 'materia'])->findOrFail($id);

    // Retornar la vista con los datos
    return view('reservas.show', compact('reserva'));
}
}
