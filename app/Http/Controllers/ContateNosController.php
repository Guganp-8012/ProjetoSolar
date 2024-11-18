<?php

namespace App\Http\Controllers;

use App\Models\ContateNos;
use App\Models\Empresa;
use Illuminate\Http\Request;

class ContateNosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'mensagem' => 'required|string',
            'empresa_id' => 'required|integer',
        ]);

        $contate = new ContateNos();
        $contate->nome = $request->nome;
        $contate->email = $request->email;
        $contate->mensagem = $request->mensagem;
        $contate->empresa_id = $request->empresa_id;
        $contate->save();

        return redirect()->route('empresa.contato');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContateNos $contateNos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContateNos $contateNos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContateNos $contateNos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContateNos $contateNos)
    {
        //
    }
}
