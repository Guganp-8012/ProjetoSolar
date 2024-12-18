<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\ContateNos;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('empresa.sobre');
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
            'razao_social' => 'required',
            'logo' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'email' => 'required|email',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string',
            'descricao' => 'required|string|max:255',
        ]);

        $foto_caminho = $request->file('logo')->store('fotos_empresa', 'public');

        $postagem = Empresa::create([
            'razao_social' => $request->razao_social,
            'logo' => $foto_caminho,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('empresa.contato')->with('success', 'Empresa cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
