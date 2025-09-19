<?php

namespace App\Http\Controllers;

use App\Models\Foco;
use Illuminate\Http\Request;

class FocoController extends Controller
{
    public function index()
    {
        $focos = Foco::all();
        return view('focos.index', compact('focos'));
    }

    public function create()
    {
        return view('focos.create');
    }

    public function store(Request $request)
    {
        Foco::create($request->all());
        return redirect()->route('focos.index');
    }

    public function show(Foco $foco)
    {
        return view('focos.show', compact('foco'));
    }

    public function edit(Foco $foco)
    {
        return view('focos.edit', compact('foco'));
    }

    public function update(Request $request, Foco $foco)
    {
        $foco->update($request->all());
        return redirect()->route('focos.index');
    }

    public function destroy(Foco $foco)
    {
        $foco->delete();
        return redirect()->route('focos.index');
    }
}
