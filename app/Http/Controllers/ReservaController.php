<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        return view('reservas.create');
    }

    public function store(Request $request)
    {
        Reserva::create($request->all());
        return redirect()->route('reservas.index');
    }

    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        return view('reservas.edit', compact('reserva'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $reserva->update($request->all());
        return redirect()->route('reservas.index');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index');
    }

    public function grafico()
    {
        $data = DB::table('reservas')
            ->selectRaw('MONTH(created_at) as mes, COUNT(*) as cantidad')
            ->groupBy('mes')
            ->pluck('cantidad', 'mes');

        $meses = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];

        $labels = [];
        $values = [];

        foreach ($data as $mes => $cantidad) {
            $labels[] = $meses[$mes];
            $values[] = $cantidad;
        }

        return view('reservas.grafico', compact('labels', 'values'));
    }
}
