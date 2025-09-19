<?php

namespace App\Http\Controllers;

use App\Models\AireAcondicionado;
use Illuminate\Http\Request;

class AireAcondicionadoController extends Controller
{
    public function index()
    {
        $aires = AireAcondicionado::all();
        return view('aireacondicionados.index', compact('aires'));
    }

    public function create()
    {
        return view('aireacondicionados.create');
    }

    public function store(Request $request)
    {
        AireAcondicionado::create($request->all());
        return redirect()->route('aireacondicionados.index');
    }

    public function show(AireAcondicionado $aireacondicionado)
    {
        return view('aireacondicionados.show', compact('aireacondicionado'));
    }

    public function edit(AireAcondicionado $aireacondicionado)
    {
        return view('aireacondicionados.edit', compact('aireacondicionado'));
    }

    public function update(Request $request, AireAcondicionado $aireacondicionado)
    {
        $aireacondicionado->update($request->all());
        return redirect()->route('aireacondicionados.index');
    }

    public function destroy(AireAcondicionado $aireacondicionado)
    {
        $aireacondicionado->delete();
        return redirect()->route('aireacondicionados.index');
    }
}
