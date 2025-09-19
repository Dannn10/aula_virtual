<?php

namespace App\Http\Controllers;

use App\Models\HistorialUsoAireAcondicionado;
use Illuminate\Http\Request;

class HistorialUsoAireAcondicionadoController extends Controller
{
    public function index()
    {
        $historiales = HistorialUsoAireAcondicionado::all();
        return view('historialusoaireacondicionados.index', compact('historiales'));
    }

    public function create()
    {
        return view('historialusoaireacondicionados.create');
    }

    public function store(Request $request)
    {
        HistorialUsoAireAcondicionado::create($request->all());
        return redirect()->route('historialusoaireacondicionados.index');
    }

    public function show(HistorialUsoAireAcondicionado $historial)
    {
        return view('historialusoaireacondicionados.show', compact('historial'));
    }

    public function edit(HistorialUsoAireAcondicionado $historial)
    {
        return view('historialusoaireacondicionados.edit', compact('historial'));
    }

    public function update(Request $request, HistorialUsoAireAcondicionado $historial)
    {
        $historial->update($request->all());
        return redirect()->route('historialusoaireacondicionados.index');
    }

    public function destroy(HistorialUsoAireAcondicionado $historial)
    {
        $historial->delete();
        return redirect()->route('historialusoaireacondicionados.index');
    }
}
