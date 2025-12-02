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

    public function show(HistorialUsoAireAcondicionado $historialusoaireacondicionado)
    {
        return view('historialusoaireacondicionados.show', compact('historialusoaireacondicionado'));
    }

    public function edit(HistorialUsoAireAcondicionado $historialusoaireacondicionado)
    {
        return view('historialusoaireacondicionados.edit', compact('historialusoaireacondicionado'));
    }

    public function update(Request $request, HistorialUsoAireAcondicionado $historialusoaireacondicionado)
    {
        $historialusoaireacondicionado->update($request->all());
        return redirect()->route('historialusoaireacondicionados.index');
    }

    public function destroy(HistorialUsoAireAcondicionado $historialusoaireacondicionado)
    {
        $historialusoaireacondicionado->delete();
        return redirect()->route('historialusoaireacondicionados.index');
    }
}