<?php

namespace App\Http\Controllers;

use App\Models\Depoimento;
use App\Models\User;
use App\Models\Empresa;
use Illuminate\Http\Request;

class DepoimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresa = Empresa::find(1);
        $depoimentos = Depoimento::with('user')->get();

        return view('homepage', compact('empresa', 'depoimentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'texto' => 'required|string',
        ]);

        Depoimento::create([
            'texto' => $request->texto,
            'user_id' => auth()->user()->id,
            'empresa_id' => 1,
        ]);

        return redirect()->route('homepage');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empresa = Empresa::find(1);

        return view('homepage', compact('depoimento', 'empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $depoimento = Depoimento::find($id);
        return view('depoimento.edit', ['depoimento' => $depoimento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $depoimento = Depoimento::find($id);

        $depoimento->update([
            'texto' => $request->texto,
        ]);

        return redirect()->route('homepage');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $depoimento = Depoimento::find($id);
        $depoimento->delete();

        return redirect()->route('homepage');
    }

    public function servico()
    {
    $empresa = Empresa::find(1);
    $depoimentos = Depoimento::with('user')->get();

    return view('servico.index', compact('empresa', 'depoimentos'));
    }
}
