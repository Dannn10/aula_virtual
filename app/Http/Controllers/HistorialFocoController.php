<?php

namespace App\Http\Controllers;

use App\Models\HistorialFoco;
use Illuminate\Http\Request;

class HistorialFocoController extends Controller
{
    public function index()
    {
        $historial = HistorialFoco::all(); // Cambié $historiales por $historial
        return view('historialfocos.index', compact('historial'));
    }

    public function create()
    {
        return view('historialfocos.create');
    }

    public function store(Request $request)
    {
        HistorialFoco::create($request->all());
        return redirect()->route('historialfocos.index');
    }

    public function show(HistorialFoco $historialfoco)
    {
        return view('historialfocos.show', compact('historialfoco'));
    }

    public function edit(HistorialFoco $historialfoco)
    {
        return view('historialfocos.edit', compact('historialfoco'));
    }

    public function update(Request $request, HistorialFoco $historialfoco)
    {
        $historialfoco->update($request->all());
        return redirect()->route('historialfocos.index');
    }

    public function destroy(HistorialFoco $historialfoco)
    {
        $historialfoco->delete();
        return redirect()->route('historialfocos.index');
    }
}